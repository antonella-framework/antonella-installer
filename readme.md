# ⚙️ Antonella Installer

Bienvenido al instalador oficial del **Antonella Framework para WordPress**.  
Este instalador te permite crear nuevos proyectos Antonella con un solo comando, de forma rápida, elegante y profesional.

> 🧪 Inspirado en la experiencia de desarrollo de Laravel, adaptado al ecosistema WordPress.

---

## 🚀 ¿Qué es Antonella?

Antonella es un micro-framework para desarrolladores WordPress que buscan trabajar con una arquitectura moderna, organizada y escalable.

Este instalador crea una estructura base con todos los archivos necesarios para comenzar un proyecto personalizado en WordPress utilizando Antonella Framework.

---

## 📦 Requisitos

- PHP >= 8.0
- Composer
- cURL o acceso a internet para descargar la plantilla base

---

## 🛠 Instalación del instalador (global)

```bash
composer global require cehojac/antonella-installer
```

Asegúrate de que
```bash
 ~/.composer/vendor/bin
```

```bash
 ~/.config/composer/vendor/bin
```

 esté en tu $PATH para poder usar el comando antonella desde cualquier parte.


---

##  ⚡ Uso
```bash
antonella new nombre-del-proyecto
```
Esto hará:

Descargar la plantilla oficial desde GitHub

Extraerla en ./nombre-del-proyecto

Sugerir comandos siguientes como composer install, etc.
