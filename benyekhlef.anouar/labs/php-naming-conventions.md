---
marp: true
theme: default
paginate: true
headingDivider: 1
backgroundColor: #ffffff
color: #2c3e50
style: |
  * {
    color: #2c3e50;
  }
  
  section { 
    font-size: 28px; 
    line-height: 1.5;
    padding: 50px 70px;
    background: #ffffff;
    color: #2c3e50;
  }
  
  section.lead h1 {
    text-align: center;
    font-size: 60px;
    margin: 0;
    padding-top: 150px;
    color: #1a252f;
  }
  
  section.title h1 {
    font-size: 48px;
    text-align: center;
    margin-top: 120px;
    color: #1a252f;
  }
  
  h1 {
    color: #1a252f;
    margin-bottom: 25px;
    font-weight: 700;
  }
  
  h2 {
    color: #1a252f;
    font-size: 38px;
    border-bottom: 5px solid #3498db;
    padding-bottom: 12px;
    margin-bottom: 30px;
    font-weight: 700;
  }
  
  pre {
    background: #f5f7fa;
    border: 2px solid #d1d9e0;
    border-radius: 8px;
    padding: 16px;
    font-size: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    color: #2c3e50;
  }
  
  code {
    background: #f5f7fa;
    padding: 4px 8px;
    border-radius: 4px;
    font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
    color: #2c3e50;
  }
  
  ul, ol {
    margin-left: 40px;
    color: #2c3e50;
  }
  
  li { 
    margin-bottom: 12px;
    color: #2c3e50;
  }
  
  strong { 
    color: #1a252f;
    font-weight: 700;
  }
  
  .columns {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin: 30px 0;
  }
  
  .columns > div {
    background: #f5f7fa;
    padding: 20px;
    border-radius: 10px;
    border: 2px solid #d1d9e0;
  }
  
  .correct { 
    border-left: 6px solid #27ae60;
    background: #f0fdf4;
  }
  
  .incorrect { 
    border-left: 6px solid #e74c3c;
    background: #fef2f2;
  }
  
  .footer {
    position: absolute;
    bottom: 30px;
    left: 80px;
    font-size: 18px;
    color: #7f8c8d;
  }
  
  a {
    color: #3498db;
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }

---

# PHP Naming Conventions

A guide to writing readable, maintainable, and professional PHP code

Following PSR standards and community best practices

---

## Why Naming Conventions Matter

- PHP is flexible and **case-sensitive**
- The language does not enforce strict naming rules
- Good conventions improve:
  - **Readability** – code is easier to understand
  - **Collaboration** – team members follow the same rules
  - **Maintainability** – easier to modify and extend code
  - **Fewer bugs and naming conflicts** – less ambiguity

**Main sources**:
- PSR-1 (Basic Coding Standard)
- PSR-12 (Extended Coding Style)
- PHP manual guidelines

**Consistency is more important than the exact style!**

---

## 1. Classes, Interfaces & Traits

**Convention**: **StudlyCaps** (PascalCase / UpperCamelCase)
No underscores or hyphens

<div class="columns">

<div class="correct">

**Correct** ✅

```php
class UserController { }
class HttpRequestHandler { }
interface Cacheable { }
trait LoggableTrait { }
```

</div>

<div class="incorrect">

**Incorrect** ❌

```php
class user_controller { }
class Http_request_handler { }
class cacheable_interface { }
```

</div>

</div>

**Why?** Clearly distinguishes classes from other elements. Standard in modern object-oriented PHP.

---

## 2. Methods (Inside Classes)

**Convention**: **camelCase** (lowerCamelCase)
Start with lowercase, capitalize subsequent words

<div class="columns">

<div class="correct">

**Correct** ✅

```php
public function getUserData() { }
protected function processPayment() { }
private function validateInput() { }
```

</div>

<div class="incorrect">

**Incorrect** ❌

```php
public function GetUserData() { }
public function process_payment() { }
private function _internalMethod() { }
```

</div>

</div>

**Important notes**:
- Always declare visibility explicitly (`public`, `protected`, `private`)
- Never use underscore to indicate visibility

---

## 3. Standalone Functions

**Convention**: **snake_case** (lowercase with underscores)
Matches PHP's built-in functions

<div class="columns">

<div class="correct">

**Correct** ✅

```php
function validate_email($email) { }
function calculate_total($items) { }
function myext_do_something() { }
```

</div>

<div class="incorrect">

**Incorrect** ❌

```php
function validateEmail($email) { }
function CalculateTotal($items) { }
```

</div>

</div>

**Tip**: Prefix library/extension functions to avoid global conflicts (e.g., `myext_`, `vendor_`)

---

## 4. Variables & Properties

No strict PSR rule → **choose one style and stay consistent**

Most common choices:

<div class="columns">

<div class="correct">

**snake_case**

Popular in procedural code & WordPress

```php
$user_name = 'John';
$total_amount = 99.99;
private string $registration_date;
```

</div>

<div class="correct">

**camelCase**

Popular in Laravel & Symfony

```php
$userName = 'John';
$totalAmount = 99.99;
private string $registrationDate;
```

</div>

</div>

---

**Best practices**:
- Avoid unclear abbreviations (prefer `$id`, `$url`)
- Declare property visibility and type when possible
- One property per declaration statement

---

## 5. Constants

**Convention**: **SCREAMING_SNAKE_CASE**
All uppercase, words separated by underscores

<div class="columns">

<div class="correct">

**Correct** ✅

```php
define('MAX_USERS', 100);
const API_VERSION = '2.0';

class Config {
    public const MAX_UPLOAD_SIZE = 10485760;
}
```

</div>

<div class="incorrect">

**Incorrect** ❌

```php
const maxUsers = 100;
define('api_version', '2.0');
```

</div>

</div>

**Why?** Constants stand out as immutable values. Easy to spot in code.

---

## 6. Namespaces

**Convention**: StudlyCaps (same as classes)
Separated by backslashes

<div class="columns">

<div class="correct">

**Correct** ✅

```php
namespace App\Controllers;
namespace Vendor\Package\Utils;
namespace Psr\Log;
```

</div>

<div class="incorrect">

**Incorrect** ❌

```php
namespace app\controllers;
namespace vendor-package;
```

</div>

</div>

**Why?** Organizes code and prevents naming collisions. Essential for PSR-4 autoloading.

---

## 7. File Naming

**Convention**:
- **Class files**: exactly match class name → `UserController.php`
- **Other files**: lowercase with hyphens or underscores

**Examples**:
```
UserController.php
HttpRequestHandler.php
config.php
helpers.php
string-helpers.php
```

**Why?** Required for PSR-4 autoloading. Avoid mixed case on case-sensitive filesystems.

---

## Best Practices Summary

- **Consistency is king** – choose PSR-12 and enforce it
- Use tools: **PHP_CodeSniffer**, **PHP CS Fixer**
- Avoid Hungarian notation (`$strName`, `$intCount`)
- Never start names with `__` unless using magic methods
- Always use **descriptive, meaningful names**

**Framework variations**:
- **Laravel**: camelCase methods, snake_case for database/attributes
- **WordPress**: snake_case everywhere

---

## Thank You!

Following these conventions leads to cleaner, more professional, and maintainable PHP code

**Resources**:
- PSR-1 & PSR-12: https://www.php-fig.org/psr/
- PHP Manual Userland Naming: https://www.php.net/manual/en/userlandnaming.php
