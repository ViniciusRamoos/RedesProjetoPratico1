
# 🛡️ Projetos de Segurança em Redes: CSRF & SSRF

Este repositório contém quatro projetos simples em PHP simulando ataques e defesas para:

- **CSRF (Cross-Site Request Forgery)**
- **SSRF (Server-Side Request Forgery)**

---

## 📦 Estrutura

```
.
├── csrf/
│   ├── index.php
│   ├── dashboard.php
│   ├── change-password.php
│   └── attack.html
├── ssrf/
│   ├── public/
│   │   └── index.php
│   └── internal/
│       └── internal-api.php
├── csrf-seguro/
│   ├── index.php
│   ├── dashboard.php
│   ├── change-password.php
│   └── attack.html
├── ssrf-seguro/
│   ├── public/
│   │   └── index.php
│   └── internal/
│       └── internal-api.php
└── README.md
```

---

## ✅ Pré-requisitos

- PHP instalado e disponível no terminal (`php -v`)
- Visual Studio Code (opcional)
- Navegador para testes

---

## ⚔️ Projeto 1 — CSRF

### 📁 Localização
```
/csrf
```

### 🚀 Rodando

1. Abra o terminal na pasta `csrf/`:

```bash
cd csrf
php -S localhost:8000
```

2. Acesse no navegador:

```
http://localhost:8000/index.php
```

3. Faça login com:
- Usuário: `admin`
- Senha: `123`

4. Vá para "Alterar senha" e teste o formulário normalmente.

---

### 🧪 Testando o ataque (CSRF)

1. Abra o arquivo `attack.html` diretamente no navegador:
```
file:///C:/CAMINHO/ATÉ/PROJETO/csrf/attack.html
```

2. Ele irá alterar a senha via POST sem token.

---

## ⚔️ Projeto 2 — SSRF

### 📁 Localização
```
/ssrf
```

### 🚀 Rodando dois servidores PHP

---

1. Abra dois terminais:

#### Terminal 1:
```bash
cd ssrf/public
php -S localhost:8000
```

#### Terminal 2:
```bash
cd ssrf/internal
php -S localhost:8001
```

---

### 🧪 Testando o ataque (SSRF)

1. Acesse a interface pública:

```
http://localhost:8000/index.php
```

2. No campo de URL, tente:

```
http://localhost:8001/internal-api.php
```

🛑 Serão retornados **dados confidencias** através do IP interno do outro servidor

---

## 🛡️ Projeto 3 — CSRF-Seguro

### 📁 Localização
```
/csrf-seguro
```

### 🚀 Rodando

1. Abra o terminal na pasta `csrf-seguro/`:

```bash
cd csrf-seguro
php -S localhost:8000
```

2. Acesse no navegador:

```
http://localhost:8000/index.php
```

3. Faça login com:
- Usuário: `admin`
- Senha: `123`

4. Vá para "Alterar senha" e teste o formulário normalmente.

---

### 🧪 Testando o ataque (CSRF)

1. Abra o arquivo `attack.html` diretamente no navegador:
```
file:///C:/CAMINHO/ATÉ/PROJETO/csrf-seguro/attack.html
```

2. Ele tentará alterar a senha via POST sem token.

👉 Como agora a aplicação exige **token CSRF**, o ataque será bloqueado.

---

## 🛡️ Projeto 4 — SSRF-Seguro

### 📁 Localização
```
/ssrf-seguro
```

### 🚀 Rodando os dois servidores

---

1. Abra dois terminais:

#### Terminal 1:
```bash
cd ssrf-seguro/public
php -S localhost:8000
```

#### Terminal 2:
```bash
cd ssrf-seguro/internal
php -S localhost:8001
```

---

### 🧪 Testando o ataque (SSRF)

1. Acesse a interface pública:

```
http://localhost:8000/index.php
```

2. No campo de URL, tente:

```
http://localhost:8001/internal-api.php
```

🛑 O acesso será **bloqueado com mensagem: "Acesso negado: endereço interno bloqueado!"**

✅ Isso demonstra a mitigação do SSRF via validação de IPs privados.

---

## 🔐 Resumo das Proteções

| Projeto | Proteção aplicada |
|--------|--------------------|
| CSRF   | Tokens por sessão, validação no POST |
| SSRF   | Bloqueio de IPs internos (127.0.0.1, localhost, etc) |

---
