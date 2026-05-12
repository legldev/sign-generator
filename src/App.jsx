import React, { useMemo, useRef, useState } from 'react';
import {
  ArrowDown,
  ArrowUp,
  BriefcaseBusiness,
  Building2,
  Check,
  Clipboard,
  Copy,
  Download,
  Eye,
  FileCode2,
  FileImage,
  FileText,
  ImagePlus,
  Link,
  Mail,
  Palette,
  Phone,
  Plus,
  Save,
  Trash2,
  Type,
  User,
} from 'lucide-react';

const blockPresets = {
  person: {
    label: 'Persona',
    icon: User,
    fields: {
      name: 'Alex Morgan',
      role: 'Founder & CEO',
      department: 'Product Strategy',
    },
  },
  company: {
    label: 'Empresa',
    icon: Building2,
    fields: {
      company: 'Northline Studio',
      tagline: 'Digital products that feel sharp and human',
      website: 'northline.example',
    },
  },
  contact: {
    label: 'Contacto',
    icon: Phone,
    fields: {
      email: 'alex@northline.example',
      phone: '+1 555 0134',
      address: 'Austin, TX',
    },
  },
  socials: {
    label: 'Links',
    icon: Link,
    fields: {
      linkedin: 'linkedin.com/in/alexmorgan',
      instagram: '@northline',
      booking: 'cal.com/alex',
    },
  },
  disclaimer: {
    label: 'Legal',
    icon: FileText,
    fields: {
      text: 'This message and any attachments are confidential and intended only for the recipient.',
    },
  },
  custom: {
    label: 'Libre',
    icon: Type,
    fields: {
      title: 'Office',
      line1: 'Mon-Fri 9:00-18:00',
      line2: 'Remote first',
    },
  },
};

const starterBlocks = ['person', 'company', 'contact', 'socials'].map((type, index) => ({
  id: crypto.randomUUID(),
  type,
  visible: true,
  fields: blockPresets[type].fields,
  order: index,
}));

const defaultState = {
  logo: '',
  logoAlt: 'Company logo',
  accent: '#1f7a8c',
  ink: '#1d252c',
  muted: '#5d6a72',
  background: '#ffffff',
  font: 'Arial, Helvetica, sans-serif',
  layout: 'side',
  blocks: starterBlocks,
};

function escapeHtml(value = '') {
  return String(value)
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#039;');
}

function linkify(value = '') {
  const text = escapeHtml(value.trim());
  if (!text) return '';
  if (text.startsWith('@')) {
    const handle = text.slice(1);
    return `<a href="https://instagram.com/${handle}" style="color:inherit;text-decoration:none;">${text}</a>`;
  }
  if (text.includes('@') && !text.includes('/')) {
    return `<a href="mailto:${text}" style="color:inherit;text-decoration:none;">${text}</a>`;
  }
  const href = text.startsWith('http') ? text : `https://${text}`;
  return `<a href="${href}" style="color:inherit;text-decoration:none;">${text}</a>`;
}

function renderBlock(block, colors) {
  const fields = block.fields;
  if (!block.visible) return '';

  if (block.type === 'person') {
    return `
      <div style="margin-bottom:10px;">
        <div style="font-size:18px;font-weight:700;color:${colors.ink};line-height:1.25;">${escapeHtml(fields.name)}</div>
        <div style="font-size:13px;color:${colors.accent};font-weight:700;line-height:1.35;">${escapeHtml(fields.role)}</div>
        <div style="font-size:12px;color:${colors.muted};line-height:1.35;">${escapeHtml(fields.department)}</div>
      </div>`;
  }

  if (block.type === 'company') {
    return `
      <div style="margin-bottom:10px;">
        <div style="font-size:13px;font-weight:700;color:${colors.ink};line-height:1.35;">${escapeHtml(fields.company)}</div>
        <div style="font-size:12px;color:${colors.muted};line-height:1.35;">${escapeHtml(fields.tagline)}</div>
        <div style="font-size:12px;color:${colors.accent};line-height:1.35;">${linkify(fields.website)}</div>
      </div>`;
  }

  if (block.type === 'contact') {
    return `
      <div style="font-size:12px;color:${colors.ink};line-height:1.6;margin-bottom:10px;">
        ${fields.email ? `<div>${linkify(fields.email)}</div>` : ''}
        ${fields.phone ? `<div>${escapeHtml(fields.phone)}</div>` : ''}
        ${fields.address ? `<div>${escapeHtml(fields.address)}</div>` : ''}
      </div>`;
  }

  if (block.type === 'socials') {
    const links = Object.values(fields)
      .filter(Boolean)
      .map((item) => `<span style="display:inline-block;margin-right:10px;">${linkify(item)}</span>`)
      .join('');
    return `<div style="font-size:12px;color:${colors.accent};line-height:1.6;margin-bottom:10px;">${links}</div>`;
  }

  if (block.type === 'disclaimer') {
    return `<div style="font-size:10px;color:${colors.muted};line-height:1.35;max-width:520px;border-top:1px solid #d8dee2;padding-top:8px;">${escapeHtml(fields.text)}</div>`;
  }

  return `
    <div style="font-size:12px;color:${colors.ink};line-height:1.45;margin-bottom:10px;">
      ${fields.title ? `<div style="font-weight:700;color:${colors.accent};">${escapeHtml(fields.title)}</div>` : ''}
      ${fields.line1 ? `<div>${escapeHtml(fields.line1)}</div>` : ''}
      ${fields.line2 ? `<div>${escapeHtml(fields.line2)}</div>` : ''}
    </div>`;
}

function buildSignatureHtml(state) {
  const ordered = [...state.blocks].sort((a, b) => a.order - b.order);
  const body = ordered.map((block) => renderBlock(block, state)).join('');
  const logo = state.logo
    ? `<td style="vertical-align:top;padding-right:16px;width:104px;"><img src="${state.logo}" alt="${escapeHtml(state.logoAlt)}" width="88" style="display:block;max-width:88px;height:auto;border:0;border-radius:10px;" /></td>`
    : '';
  const divider = state.logo && state.layout === 'side'
    ? '<td style="width:1px;background:#d8dee2;font-size:0;line-height:0;">&nbsp;</td><td style="width:16px;">&nbsp;</td>'
    : '';

  if (state.layout === 'stacked') {
    return `
      <table cellpadding="0" cellspacing="0" role="presentation" style="font-family:${state.font};background:${state.background};color:${state.ink};">
        <tr>
          <td style="vertical-align:top;padding:0;">
            ${state.logo ? `<img src="${state.logo}" alt="${escapeHtml(state.logoAlt)}" width="96" style="display:block;max-width:96px;height:auto;border:0;border-radius:10px;margin-bottom:12px;" />` : ''}
            ${body}
          </td>
        </tr>
      </table>`.trim();
  }

  return `
    <table cellpadding="0" cellspacing="0" role="presentation" style="font-family:${state.font};background:${state.background};color:${state.ink};">
      <tr>
        ${logo}
        ${divider}
        <td style="vertical-align:top;padding:0 0 0 ${state.logo ? '0' : '0'};">
          ${body}
        </td>
      </tr>
    </table>`.trim();
}

function Field({ label, value, onChange, multiline = false }) {
  const Input = multiline ? 'textarea' : 'input';
  return (
    <label className="field">
      <span>{label}</span>
      <Input value={value || ''} onChange={(event) => onChange(event.target.value)} rows={3} />
    </label>
  );
}

function IconButton({ title, onClick, children, disabled = false }) {
  return (
    <button className="icon-button" type="button" title={title} aria-label={title} onClick={onClick} disabled={disabled}>
      {children}
    </button>
  );
}

export default function App() {
  const [signature, setSignature] = useState(defaultState);
  const [copied, setCopied] = useState('');
  const previewRef = useRef(null);
  const html = useMemo(() => buildSignatureHtml(signature), [signature]);

  const update = (patch) => setSignature((current) => ({ ...current, ...patch }));
  const updateBlock = (id, patch) => {
    setSignature((current) => ({
      ...current,
      blocks: current.blocks.map((block) => (block.id === id ? { ...block, ...patch } : block)),
    }));
  };
  const updateBlockField = (id, key, value) => {
    setSignature((current) => ({
      ...current,
      blocks: current.blocks.map((block) => (
        block.id === id ? { ...block, fields: { ...block.fields, [key]: value } } : block
      )),
    }));
  };

  const addBlock = (type) => {
    setSignature((current) => ({
      ...current,
      blocks: [
        ...current.blocks,
        {
          id: crypto.randomUUID(),
          type,
          visible: true,
          order: current.blocks.length,
          fields: { ...blockPresets[type].fields },
        },
      ],
    }));
  };

  const removeBlock = (id) => {
    setSignature((current) => ({
      ...current,
      blocks: current.blocks.filter((block) => block.id !== id).map((block, index) => ({ ...block, order: index })),
    }));
  };

  const moveBlock = (id, direction) => {
    setSignature((current) => {
      const blocks = [...current.blocks].sort((a, b) => a.order - b.order);
      const index = blocks.findIndex((block) => block.id === id);
      const nextIndex = index + direction;
      if (nextIndex < 0 || nextIndex >= blocks.length) return current;
      [blocks[index], blocks[nextIndex]] = [blocks[nextIndex], blocks[index]];
      return { ...current, blocks: blocks.map((block, order) => ({ ...block, order })) };
    });
  };

  const handleLogoFile = (file) => {
    if (!file) return;
    const reader = new FileReader();
    reader.onload = () => update({ logo: reader.result });
    reader.readAsDataURL(file);
  };

  const downloadFile = (filename, content, type) => {
    const blob = new Blob([content], { type });
    const url = URL.createObjectURL(blob);
    const anchor = document.createElement('a');
    anchor.href = url;
    anchor.download = filename;
    anchor.click();
    URL.revokeObjectURL(url);
  };

  const copyHtml = async () => {
    try {
      if ('ClipboardItem' in window) {
        await navigator.clipboard.write([
          new ClipboardItem({
            'text/html': new Blob([html], { type: 'text/html' }),
            'text/plain': new Blob([html], { type: 'text/plain' }),
          }),
        ]);
      } else {
        await navigator.clipboard.writeText(html);
      }
      setCopied('HTML copiado');
    } catch {
      setCopied('No se pudo copiar');
    }
  };

  const copyRendered = async () => {
    const selection = window.getSelection();
    const range = document.createRange();
    range.selectNode(previewRef.current);
    selection.removeAllRanges();
    selection.addRange(range);
    document.execCommand('copy');
    selection.removeAllRanges();
    setCopied('Firma copiada');
  };

  const exportImage = async (format) => {
    try {
      const { default: html2canvas } = await import('html2canvas');
      const canvas = await html2canvas(previewRef.current, {
        backgroundColor: signature.background,
        scale: 3,
        useCORS: true,
      });
      const type = format === 'jpg' ? 'image/jpeg' : 'image/png';
      const url = canvas.toDataURL(type, 0.96);
      const anchor = document.createElement('a');
      anchor.href = url;
      anchor.download = `signature.${format}`;
      anchor.click();
      setCopied(`${format.toUpperCase()} exportado`);
    } catch {
      setCopied('No se pudo exportar');
    }
  };

  const exportPdf = async () => {
    try {
      const [{ default: html2canvas }, { jsPDF }] = await Promise.all([
        import('html2canvas'),
        import('jspdf'),
      ]);
      const canvas = await html2canvas(previewRef.current, {
        backgroundColor: signature.background,
        scale: 3,
        useCORS: true,
      });
      const imageData = canvas.toDataURL('image/png');
      const pdf = new jsPDF({
        orientation: canvas.width > canvas.height ? 'landscape' : 'portrait',
        unit: 'px',
        format: [canvas.width + 48, canvas.height + 48],
      });
      pdf.addImage(imageData, 'PNG', 24, 24, canvas.width, canvas.height);
      pdf.save('signature.pdf');
      setCopied('PDF exportado');
    } catch {
      setCopied('No se pudo exportar');
    }
  };

  return (
    <main className="app-shell">
      <section className="workspace">
        <aside className="panel controls-panel">
          <div className="brand-bar">
            <BriefcaseBusiness size={24} />
            <div>
              <h1>Signature Generator</h1>
            </div>
          </div>

          <div className="toolbar">
            <button type="button" onClick={copyRendered}><Copy size={16} /> Copiar firma</button>
            <button type="button" onClick={copyHtml}><Clipboard size={16} /> Copiar HTML</button>
            <button type="button" onClick={() => downloadFile('signature.html', html, 'text/html')}><FileCode2 size={16} /> HTML</button>
          </div>
          {copied && <div className="status"><Check size={15} /> {copied}</div>}

          <div className="control-group">
            <h2><ImagePlus size={18} /> Logo</h2>
            <div className="logo-grid">
              <label className="upload-tile">
                <ImagePlus size={18} />
                <span>Archivo</span>
                <input type="file" accept="image/*" onChange={(event) => handleLogoFile(event.target.files?.[0])} />
              </label>
              <Field label="URL" value={signature.logo.startsWith('data:') ? '' : signature.logo} onChange={(logo) => update({ logo })} />
            </div>
            <Field label="Alt" value={signature.logoAlt} onChange={(logoAlt) => update({ logoAlt })} />
          </div>

          <div className="control-group">
            <h2><Palette size={18} /> Estilo</h2>
            <div className="color-row">
              <label><span>Accent</span><input type="color" value={signature.accent} onChange={(event) => update({ accent: event.target.value })} /></label>
              <label><span>Texto</span><input type="color" value={signature.ink} onChange={(event) => update({ ink: event.target.value })} /></label>
              <label><span>Fondo</span><input type="color" value={signature.background} onChange={(event) => update({ background: event.target.value })} /></label>
            </div>
            <label className="field">
              <span>Tipografia</span>
              <select value={signature.font} onChange={(event) => update({ font: event.target.value })}>
                <option value="Arial, Helvetica, sans-serif">Arial</option>
                <option value="Georgia, 'Times New Roman', serif">Georgia</option>
                <option value="'Trebuchet MS', Arial, sans-serif">Trebuchet</option>
                <option value="'Courier New', Courier, monospace">Courier</option>
              </select>
            </label>
            <div className="segmented" role="group" aria-label="Layout">
              <button type="button" className={signature.layout === 'side' ? 'active' : ''} onClick={() => update({ layout: 'side' })}>Lateral</button>
              <button type="button" className={signature.layout === 'stacked' ? 'active' : ''} onClick={() => update({ layout: 'stacked' })}>Vertical</button>
            </div>
          </div>

          <div className="control-group">
            <h2><Plus size={18} /> Secciones</h2>
            <div className="add-grid">
              {Object.entries(blockPresets).map(([type, preset]) => {
                const Icon = preset.icon;
                return (
                  <button type="button" key={type} onClick={() => addBlock(type)}>
                    <Icon size={16} /> {preset.label}
                  </button>
                );
              })}
            </div>
          </div>
        </aside>

        <section className="panel editor-panel">
          <div className="panel-heading">
            <h2><Type size={18} /> Editor</h2>
            <span>{signature.blocks.length} secciones</span>
          </div>
          <div className="blocks-list">
            {[...signature.blocks].sort((a, b) => a.order - b.order).map((block, index) => {
              const preset = blockPresets[block.type];
              const Icon = preset.icon;
              return (
                <article className={`block-card ${block.visible ? '' : 'is-muted'}`} key={block.id}>
                  <header>
                    <div className="block-title"><Icon size={17} /> {preset.label}</div>
                    <div className="block-actions">
                      <IconButton title="Subir" onClick={() => moveBlock(block.id, -1)} disabled={index === 0}><ArrowUp size={15} /></IconButton>
                      <IconButton title="Bajar" onClick={() => moveBlock(block.id, 1)} disabled={index === signature.blocks.length - 1}><ArrowDown size={15} /></IconButton>
                      <IconButton title={block.visible ? 'Ocultar' : 'Mostrar'} onClick={() => updateBlock(block.id, { visible: !block.visible })}><Eye size={15} /></IconButton>
                      <IconButton title="Eliminar" onClick={() => removeBlock(block.id)}><Trash2 size={15} /></IconButton>
                    </div>
                  </header>
                  <div className="fields-grid">
                    {Object.entries(block.fields).map(([key, value]) => (
                      <Field
                        key={key}
                        label={key}
                        value={value}
                        multiline={key === 'text'}
                        onChange={(nextValue) => updateBlockField(block.id, key, nextValue)}
                      />
                    ))}
                  </div>
                </article>
              );
            })}
          </div>
        </section>

        <aside className="preview-column">
          <section className="panel preview-panel">
            <div className="panel-heading">
              <h2><Mail size={18} /> Preview</h2>
              <div className="export-actions">
                <IconButton title="PNG" onClick={() => exportImage('png')}><FileImage size={15} /></IconButton>
                <IconButton title="JPG" onClick={() => exportImage('jpg')}><Download size={15} /></IconButton>
                <IconButton title="PDF" onClick={exportPdf}><Save size={15} /></IconButton>
              </div>
            </div>
            <div className="preview-stage">
              <div className="signature-preview" ref={previewRef} dangerouslySetInnerHTML={{ __html: html }} />
            </div>
          </section>

          <section className="panel html-panel">
            <div className="panel-heading">
              <h2><FileCode2 size={18} /> HTML</h2>
            </div>
            <textarea readOnly value={html} />
          </section>
        </aside>
      </section>
      <footer className="app-footer">
        <span>© <a href="https://fuzzdea.com" target="_blank" rel="noreferrer">fuzzdea</a>. Made with ♥.</span>
      </footer>
    </main>
  );
}
