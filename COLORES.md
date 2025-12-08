# Guía de Colores del Proyecto

## 🎨 Paleta de Colores

### Color Primario (Verde Brillante)
**Hex:** `#39A900`

**Clases disponibles:**
- `bg-primary` / `text-primary` / `border-primary`
- `bg-primary-50` hasta `bg-primary-900`
- `hover:bg-primary-700` / `hover:text-primary-800`
- `focus:ring-primary`

### Color Secundario (Verde Oscuro)
**Hex:** `#007832`

**Clases disponibles:**
- `bg-secondary` / `text-secondary` / `border-secondary`
- `bg-secondary-50` hasta `bg-secondary-900`
- `hover:bg-secondary-700` / `hover:text-secondary-800`
- `focus:ring-secondary`

## 📝 Guía de Reemplazo

### Reemplazos Comunes

#### Botones Principales
```
ANTES: bg-blue-600 hover:bg-blue-700
AHORA: bg-primary hover:bg-primary-700
```

#### Botones Secundarios
```
ANTES: bg-green-600 hover:bg-green-700
AHORA: bg-secondary hover:bg-secondary-700
```

#### Enlaces
```
ANTES: text-blue-600 hover:text-blue-800
AHORA: text-primary hover:text-primary-800
```

#### Focus en Inputs
```
ANTES: focus:ring-primary
AHORA: focus:ring-primary
```

#### Badges/Tags
```
ANTES: bg-green-100 text-green-700
AHORA: bg-primary-100 text-primary-700
```

#### Gradientes
```
ANTES: from-blue-600 to-blue-800
AHORA: from-primary to-secondary
```

## ✅ Archivos Actualizados - TODOS LOS COLORES MIGRADOS

### Páginas Principales
- ✅ `Views/home.php`
- ✅ `Views/login/index.php`
- ✅ `Views/layouts/header.php`

### Perfiles
- ✅ `Views/datospersonales/perfil.php`
- ✅ `Views/empresa/perfil.php`
- ✅ `Views/postulacion/perfilUsuario.php`

### Datos Personales
- ✅ `Views/datospersonales/index.php`
- ✅ `Views/datospersonales/crear.php`
- ✅ `Views/datospersonales/editar.php`
- ✅ `Views/datospersonales/ver.php`

### Empresa
- ✅ `Views/empresa/index.php`
- ✅ `Views/empresa/crear.php`
- ✅ `Views/empresa/editar.php`
- ✅ `Views/empresa/ver.php`

### Vacantes
- ✅ `Views/vacantes/index.php`
- ✅ `Views/vacantes/crear.php`
- ✅ `Views/vacantes/editar.php`
- ✅ `Views/vacantes/ver.php`
- ✅ `Views/vacantes/verVacantes.php`
- ✅ `Views/vacantes/detalles.php`

### Educación
- ✅ `Views/educacion/index.php`
- ✅ `Views/educacion/crear.php`
- ✅ `Views/educacion/editar.php`
- ✅ `Views/educacion/ver.php`

### Experiencia
- ✅ `Views/experiencia/index.php`
- ✅ `Views/experiencia/crear.php`
- ✅ `Views/experiencia/editar.php`
- ✅ `Views/experiencia/ver.php`

### Portafolio
- ✅ `Views/portafolio/index.php`
- ✅ `Views/portafolio/crear.php`
- ✅ `Views/portafolio/editar.php`
- ✅ `Views/portafolio/ver.php`

### Postulaciones
- ✅ `Views/postulacion/indexEmpresa.php`
- ✅ `Views/postulacion/indexUsuario.php`
- ✅ `Views/postulacion/perfilUsuario.php`

## 🎉 Estado: COMPLETADO

Todos los colores azules, verdes, morados y amarillos han sido reemplazados por los colores primario (#39A900) y secundario (#007832) del proyecto.

## 🚀 Cómo Actualizar

1. Busca en el archivo las clases con colores antiguos
2. Reemplaza según la guía de arriba
3. Guarda el archivo
4. Si `npm run dev` está corriendo, el CSS se actualizará automáticamente
5. Recarga el navegador para ver los cambios

## 💡 Ejemplos de Uso

### Botón Principal
```html
<button class="bg-primary hover:bg-primary-700 text-white px-4 py-2 rounded-lg">
    Guardar
</button>
```

### Botón Secundario
```html
<button class="bg-secondary hover:bg-secondary-700 text-white px-4 py-2 rounded-lg">
    Ver más
</button>
```

### Input con Focus
```html
<input type="text" 
       class="border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent">
```

### Badge de Estado
```html
<span class="px-3 py-1 rounded-lg bg-primary-100 text-primary-700">
    Activo
</span>
```

### Gradiente de Fondo
```html
<div class="bg-gradient-to-r from-primary to-secondary text-white p-6">
    Contenido
</div>
```
