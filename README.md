# Sistema de Gestión de Hojas de Vida - JobFinder

Plataforma web integral diseñada para optimizar la gestión de perfiles profesionales y la vinculación laboral entre candidatos y empresas.

## Funcionalidades Principales

### Para Candidatos

- **Gestión de Perfil**: Administración completa de datos personales, educación y experiencia laboral.
- **Portafolio Digital**: Sección dedicada para exhibir proyectos y logros.
- **Hoja de Vida en PDF**: Generación automática de CV profesional descargable.
- **Búsqueda de Empleo**: Visualización y postulación a vacantes disponibles.

### Para Empresas

- **Perfil Corporativo**: Gestión de información de la empresa.
- **Ofertas Laborales**: Publicación y administración de vacantes.
- **Selección de Talento**: Revisión de perfiles de candidatos postulados.

## Tecnologías Utilizadas

- **Backend**: PHP (Arquitectura MVC)
- **Frontend**: HTML5, Tailwind CSS, JavaScript
- **Base de Datos**: MySQL
- **Librerías**: mPDF (Generación de documentos), DataTables (Gestión de tablas)

## Instalación y Despliegue

1. **Clonar el repositorio** en su servidor web (htdocs/www).
2. **Base de Datos**: Configurar la conexión en `Model/connection.php`.
3. **Dependencias**: Ejecutar el siguiente comando para instalar las librerías necesarias:
   ```bash
   composer install
   ```
4. **Despliegue**: Acceder a través del navegador (ej. `http://localhost/hv-mvc`).

---

**JobFinder** - Sistema de Gestión de Talento Humano
