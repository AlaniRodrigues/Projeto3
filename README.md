# Cadastro e Listagem de Produtos

## Integrantes:
- Alani Rodrigues - 1986006
- Marcelo Amorim - 1997218

## Como executar
1. Coloque o projeto em `C:\xampp\htdocs\products-srp-demo`
2. Inicie o Apache no XAMPP.
3. Acesse no navegador: [http://localhost/products-srp-demo/public/](http://localhost/products-srp-demo/public/)

---

## 🧪 Casos de Teste Manuais

### Caso 1 – Create válido
**Entrada:**  
- name = "Teclado"  
- price = 120.50  

**Ação:** Submeter o formulário de cadastro.

**Resultado esperado:**  
- Página exibe "Produto cadastrado com sucesso!"  
- Ao acessar `products.php`, o produto aparece na listagem com ID 1.  
- **HTTP:** 201 Created.

---

### Caso 2 – Create inválido (nome curto)
**Entrada:**  
- name = "T"  
- price = 50  

**Ação:** Submeter o formulário.

**Resultado esperado:**  
- Página exibe mensagem "O nome deve ter entre 2 e 100 caracteres."  
- Produto **não** é salvo no arquivo.  
- **HTTP:** 422 Unprocessable Entity.

---

### Caso 3 – Create inválido (preço negativo)
**Entrada:**  
- name = "Mouse"  
- price = -10  

**Ação:** Submeter o formulário.

**Resultado esperado:**  
- Página exibe "O preço não pode ser negativo."  
- Produto **não** é salvo.  
- **HTTP:** 422 Unprocessable Entity.

---

### Caso 4 – List vazio
**Condição:**  
O arquivo `storage/products.txt` está vazio (sem nenhum produto cadastrado).

**Ação:**  
Abrir `products.php` no navegador.

**Resultado esperado:**  
- Página exibe "Nenhum produto cadastrado."

---

### Caso 5 – List com itens
**Condição:**  
Três produtos já cadastrados.

**Ação:**  
Acessar `products.php`.

**Resultado esperado:**  
- Tabela exibindo 3 linhas.  
- IDs incrementais (1, 2, 3).  
- Preços formatados corretamente (ex: `120,50`).

---

## ✅ Observações
- O projeto segue PSR-4, PSR-12 e SRP.  
- Nenhum framework foi usado.  
- Dados persistem em `storage/products.txt`, um JSON por linha.
