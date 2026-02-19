[![Monthly Downloads](http://poser.pugx.org/cehojac/antonella-installer/d/monthly)](https://packagist.org/packages/cehojac/antonella-installer)
[![Monthly Downloads](http://poser.pugx.org/cehojac/antonella-installer/d/monthly)](https://packagist.org/packages/cehojac/antonella-installer)
# English
# ⚙️ Antonella Installer

Welcome to the official installer for the **Antonella Framework for WordPress**.
This installer allows you to create new Antonella projects with a single command — fast, clean, and professional.

> 🧪 Inspired by the Laravel development experience, adapted to the WordPress ecosystem.

---

## 🚀 What is Antonella?

Antonella is a micro-framework for WordPress developers who want to work with a modern, organized, and scalable architecture.

This installer creates a base structure with all the necessary files to start a custom WordPress project using the Antonella Framework.

---

## 📦 Requirements

* PHP >= 8.0
* Composer
* cURL or internet access to download the base template

---

## 🛠 Installing the installer (global)

```bash
composer global require cehojac/antonella-installer
```

Make sure that:

```bash
~/.composer/vendor/bin
```

or

```bash
~/.config/composer/vendor/bin
```

is included in your `$PATH` so you can use the `antonella` command from anywhere.

---

## ⚡ Usage

```bash
antonella new project-name
```

This will:

* Download the official template from GitHub
* Extract it into `./project-name`
* Suggest the next commands such as `composer install`, etc.


# Español
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
