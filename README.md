<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 📄 Laravel PDF Generator via Docker

Este projeto Laravel gera arquivos PDF utilizando a biblioteca [barryvdh/laravel-snappy](https://github.com/barryvdh/laravel-snappy), um wrapper do [wkhtmltopdf](https://wkhtmltopdf.org/).

O ambiente roda via **Docker**, com tudo pré-configurado.

---

## 🚀 Como subir o ambiente

### Pré-requisitos

- Docker
- Docker Compose

### Subindo a aplicação

```bash
docker compose up --build -d

A aplicação estará disponível em:
👉 http://localhost:8080


🖨️ Como gerar o PDF

Acesse no navegador ou via ferramenta como Postman:

GET http://localhost:8080/gerar-pdf

🛠️ Comandos úteis

# Derrubar os containers
docker compose down

# Acessar o container da aplicação
docker exec -it laravel-pdf-app-1 bash

⚙️ Variáveis de ambiente relevantes

Certifique-se de ter no seu .env:

SNAPPY_PDF_ENABLED=true
SNAPPY_PDF_BINARY=/usr/bin/wkhtmltopdf
SNAPPY_IMAGE_ENABLED=true
SNAPPY_IMAGE_BINARY=/usr/bin/wkhtmltoimage