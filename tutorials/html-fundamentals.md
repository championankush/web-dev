# HTML Fundamentals Tutorial
## Complete Guide from Beginner to Advanced

**Navigation:** [← Back to Master Guide](../web-development-master-guide.md) | [Next: CSS Styling & Layout →](css-styling-layout.md)

---

## 📚 **Table of Contents**

1. [What is HTML?](#what-is-html)
2. [HTML Document Structure](#html-document-structure)
3. [Basic HTML Elements](#basic-html-elements)
4. [Text Formatting](#text-formatting)
5. [Links and Navigation](#links-and-navigation)
6. [Images and Media](#images-and-media)
7. [Lists and Tables](#lists-and-tables)
8. [Forms and Input](#forms-and-input)
9. [HTML5 Semantic Elements](#html5-semantic-elements)
10. [Accessibility Best Practices](#accessibility-best-practices)
11. [Advanced HTML Techniques](#advanced-html-techniques)
12. [Practice Projects](#practice-projects)

---

## 🎯 **What is HTML?**

### **Definition**
HTML (HyperText Markup Language) is the standard markup language for creating web pages. It describes the structure of web content using a system of elements and tags.

### **Key Concepts**
- **Markup Language**: Uses tags to define elements
- **Structure**: Defines the layout and organization of content
- **Semantic**: Provides meaning to content for browsers and assistive technologies
- **Platform Independent**: Works on any device with a web browser

### **How HTML Works**
```html
<!DOCTYPE html>
<html>
<head>
    <title>My First Web Page</title>
</head>
<body>
    <h1>Hello, World!</h1>
    <p>This is my first HTML page.</p>
</body>
</html>
```

---

## 🏗️ **HTML Document Structure**

### **Basic HTML Template**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <meta name="description" content="Page description">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Page content goes here -->
    <header>
        <h1>Website Title</h1>
    </header>
    
    <main>
        <p>Main content area</p>
    </main>
    
    <footer>
        <p>&copy; 2024 Your Name</p>
    </footer>
</body>
</html>
```

### **Document Structure Explained**

#### **DOCTYPE Declaration**
```html
<!DOCTYPE html>
```
- Tells the browser this is an HTML5 document
- Must be the first line of every HTML document

#### **HTML Element**
```html
<html lang="en">
```
- Root element of the HTML document
- `lang="en"` specifies the language (accessibility feature)

#### **Head Section**
```html
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <meta name="description" content="Page description">
    <link rel="stylesheet" href="styles.css">
</head>
```

**Meta Tags Explained:**
- `charset="UTF-8"`: Character encoding for international characters
- `viewport`: Controls mobile device display
- `description`: SEO and social media sharing
- `title`: Page title shown in browser tab

#### **Body Section**
```html
<body>
    <!-- All visible content goes here -->
</body>
```

---

## 📝 **Basic HTML Elements**

### **Heading Elements**
```html
<h1>Main Heading (Most Important)</h1>
<h2>Secondary Heading</h2>
<h3>Tertiary Heading</h3>
<h4>Fourth Level Heading</h4>
<h5>Fifth Level Heading</h5>
<h6>Sixth Level Heading</h6>
```

**Best Practices:**
- Use only one `<h1>` per page
- Follow logical hierarchy (h1 → h2 → h3)
- Don't skip heading levels

### **Paragraph Element**
```html
<p>This is a paragraph of text. It can contain multiple sentences and will be displayed as a block of text with appropriate spacing.</p>

<p>This is another paragraph. Each paragraph element creates a new block of text.</p>
```

### **Line Breaks and Horizontal Rules**
```html
<p>This text is on the first line.<br>This text is on the second line.</p>

<hr>

<p>Content after the horizontal rule.</p>
```

---

## 🎨 **Text Formatting**

### **Inline Text Elements**
```html
<p>This is <strong>bold text</strong> and this is <em>italic text</em>.</p>
<p>This is <b>bold</b> and this is <i>italic</i> (visual only).</p>
<p>This is <mark>highlighted text</mark>.</p>
<p>This is <del>deleted text</del> and this is <ins>inserted text</ins>.</p>
<p>This is <sub>subscript</sub> and this is <sup>superscript</sup>.</p>
<p>This is <code>inline code</code>.</p>
<p>This is <small>smaller text</small>.</p>
```

### **Semantic vs Visual Formatting**
```html
<!-- Semantic (meaningful) -->
<strong>Important information</strong>
<em>Emphasized text</em>

<!-- Visual only -->
<b>Bold text</b>
<i>Italic text</i>
```

### **Blockquote and Citations**
```html
<blockquote>
    <p>This is a long quotation that should be indented and styled differently.</p>
    <cite>- Author Name</cite>
</blockquote>

<p>As <cite>Albert Einstein</cite> said, "Imagination is more important than knowledge."</p>
```

---

## 🔗 **Links and Navigation**

### **Basic Links**
```html
<a href="https://www.example.com">Visit Example.com</a>
<a href="about.html">About Us</a>
<a href="#section-id">Jump to Section</a>
<a href="mailto:email@example.com">Send Email</a>
<a href="tel:+1234567890">Call Us</a>
```

### **Link Attributes**
```html
<a href="https://www.example.com" 
   target="_blank" 
   rel="noopener noreferrer"
   title="Visit our website">
    External Link
</a>
```

**Attributes Explained:**
- `target="_blank"`: Opens link in new tab
- `rel="noopener noreferrer"`: Security for external links
- `title`: Tooltip on hover

### **Navigation Menu**
```html
<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>
```

### **Internal Page Navigation**
```html
<!-- Create anchor points -->
<h2 id="section1">Section 1</h2>
<p>Content for section 1...</p>

<h2 id="section2">Section 2</h2>
<p>Content for section 2...</p>

<!-- Navigation links -->
<nav>
    <a href="#section1">Go to Section 1</a>
    <a href="#section2">Go to Section 2</a>
</nav>
```

---

## 🖼️ **Images and Media**

### **Basic Image**
```html
<img src="image.jpg" alt="Description of the image">
```

### **Image with Attributes**
```html
<img src="photo.jpg" 
     alt="A beautiful sunset over the mountains"
     width="300" 
     height="200"
     loading="lazy"
     title="Mountain sunset">
```

**Image Attributes:**
- `src`: Image source URL
- `alt`: Alternative text (accessibility)
- `width/height`: Dimensions
- `loading="lazy"`: Performance optimization
- `title`: Tooltip text

### **Responsive Images**
```html
<picture>
    <source media="(min-width: 800px)" srcset="large.jpg">
    <source media="(min-width: 400px)" srcset="medium.jpg">
    <img src="small.jpg" alt="Responsive image">
</picture>
```

### **Video and Audio**
```html
<!-- Video -->
<video width="320" height="240" controls>
    <source src="movie.mp4" type="video/mp4">
    <source src="movie.webm" type="video/webm">
    Your browser does not support the video tag.
</video>

<!-- Audio -->
<audio controls>
    <source src="audio.mp3" type="audio/mpeg">
    <source src="audio.ogg" type="audio/ogg">
    Your browser does not support the audio tag.
</audio>
```

---

## 📋 **Lists and Tables**

### **Unordered Lists**
```html
<ul>
    <li>First item</li>
    <li>Second item</li>
    <li>Third item</li>
</ul>

<!-- Nested lists -->
<ul>
    <li>Main item 1
        <ul>
            <li>Sub item 1.1</li>
            <li>Sub item 1.2</li>
        </ul>
    </li>
    <li>Main item 2</li>
</ul>
```

### **Ordered Lists**
```html
<ol>
    <li>First step</li>
    <li>Second step</li>
    <li>Third step</li>
</ol>

<!-- With custom numbering -->
<ol type="A" start="3">
    <li>Step C</li>
    <li>Step D</li>
    <li>Step E</li>
</ol>
```

### **Definition Lists**
```html
<dl>
    <dt>HTML</dt>
    <dd>HyperText Markup Language</dd>
    
    <dt>CSS</dt>
    <dd>Cascading Style Sheets</dd>
    
    <dt>JavaScript</dt>
    <dd>A programming language for web development</dd>
</dl>
```

### **Tables**
```html
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>City</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>John Doe</td>
            <td>25</td>
            <td>New York</td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>30</td>
            <td>Los Angeles</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total: 2 people</td>
        </tr>
    </tfoot>
</table>
```

**Table Elements:**
- `<table>`: Container for the table
- `<thead>`: Header section
- `<tbody>`: Body section
- `<tfoot>`: Footer section
- `<tr>`: Table row
- `<th>`: Header cell
- `<td>`: Data cell

---

## 📝 **Forms and Input**

### **Basic Form Structure**
```html
<form action="/submit" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <button type="submit">Submit</button>
</form>
```

### **Input Types**
```html
<!-- Text inputs -->
<input type="text" placeholder="Enter text">
<input type="email" placeholder="Enter email">
<input type="password" placeholder="Enter password">
<input type="number" min="0" max="100" step="1">
<input type="tel" placeholder="Phone number">
<input type="url" placeholder="Website URL">

<!-- Date and time -->
<input type="date">
<input type="time">
<input type="datetime-local">

<!-- File upload -->
<input type="file" accept="image/*">

<!-- Checkbox and radio -->
<input type="checkbox" id="agree" name="agree">
<label for="agree">I agree to terms</label>

<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label>

<!-- Range slider -->
<input type="range" min="0" max="100" value="50">

<!-- Color picker -->
<input type="color">

<!-- Search -->
<input type="search" placeholder="Search...">
```

### **Textarea and Select**
```html
<!-- Textarea -->
<label for="message">Message:</label>
<textarea id="message" name="message" rows="4" cols="50" placeholder="Enter your message"></textarea>

<!-- Select dropdown -->
<label for="country">Country:</label>
<select id="country" name="country">
    <option value="">Select a country</option>
    <option value="us">United States</option>
    <option value="ca">Canada</option>
    <option value="uk">United Kingdom</option>
    <option value="au">Australia</option>
</select>

<!-- Select with groups -->
<select name="category">
    <optgroup label="Fruits">
        <option value="apple">Apple</option>
        <option value="banana">Banana</option>
    </optgroup>
    <optgroup label="Vegetables">
        <option value="carrot">Carrot</option>
        <option value="broccoli">Broccoli</option>
    </optgroup>
</select>
```

### **Form Validation**
```html
<form>
    <input type="text" required placeholder="Required field">
    <input type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Valid email">
    <input type="number" min="18" max="100" placeholder="Age 18-100">
    <input type="text" minlength="3" maxlength="20" placeholder="3-20 characters">
    <button type="submit">Submit</button>
</form>
```

---

## 🏛️ **HTML5 Semantic Elements**

### **Document Structure**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Semantic HTML Page</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <article>
            <section>
                <h2>Article Section</h2>
                <p>Article content...</p>
            </section>
        </article>
        
        <aside>
            <h3>Related Information</h3>
            <p>Sidebar content...</p>
        </aside>
    </main>
    
    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>
</body>
</html>
```

### **Semantic Elements Explained**

#### **Header**
```html
<header>
    <h1>Website Title</h1>
    <nav>Navigation menu</nav>
</header>
```

#### **Navigation**
```html
<nav>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>
```

#### **Main Content**
```html
<main>
    <h1>Main Content</h1>
    <p>This is the primary content of the page.</p>
</main>
```

#### **Article**
```html
<article>
    <header>
        <h2>Article Title</h2>
        <time datetime="2024-01-15">January 15, 2024</time>
    </header>
    <p>Article content...</p>
    <footer>
        <p>Author: John Doe</p>
    </footer>
</article>
```

#### **Section**
```html
<section>
    <h2>Section Title</h2>
    <p>Section content...</p>
</section>
```

#### **Aside**
```html
<aside>
    <h3>Related Links</h3>
    <ul>
        <li><a href="#">Related Article 1</a></li>
        <li><a href="#">Related Article 2</a></li>
    </ul>
</aside>
```

#### **Footer**
```html
<footer>
    <p>&copy; 2024 Your Website</p>
    <nav>
        <a href="/privacy">Privacy Policy</a>
        <a href="/terms">Terms of Service</a>
    </nav>
</footer>
```

---

## ♿ **Accessibility Best Practices**

### **Semantic HTML**
```html
<!-- Good: Semantic structure -->
<main>
    <h1>Page Title</h1>
    <nav aria-label="Main navigation">
        <ul>
            <li><a href="#home">Home</a></li>
        </ul>
    </nav>
</main>

<!-- Bad: Non-semantic -->
<div>
    <div>Page Title</div>
    <div>
        <div><a href="#home">Home</a></div>
    </div>
</div>
```

### **Alt Text for Images**
```html
<!-- Good: Descriptive alt text -->
<img src="cat.jpg" alt="A fluffy orange cat sitting on a windowsill">

<!-- Bad: Generic alt text -->
<img src="cat.jpg" alt="cat">

<!-- Decorative images -->
<img src="decoration.jpg" alt="">
```

### **Form Labels**
```html
<!-- Good: Explicit labels -->
<label for="username">Username:</label>
<input type="text" id="username" name="username">

<!-- Good: Implicit labels -->
<label>
    Username:
    <input type="text" name="username">
</label>
```

### **ARIA Labels**
```html
<button aria-label="Close dialog">×</button>
<nav aria-label="Main navigation">
    <ul>
        <li><a href="#home" aria-current="page">Home</a></li>
    </ul>
</nav>
```

### **Skip Links**
```html
<a href="#main-content" class="skip-link">Skip to main content</a>

<main id="main-content">
    <h1>Main Content</h1>
    <!-- Content here -->
</main>
```

---

## 🚀 **Advanced HTML Techniques**

### **Data Attributes**
```html
<div data-user-id="123" data-role="admin" data-status="active">
    User Information
</div>

<script>
    const userDiv = document.querySelector('div');
    const userId = userDiv.dataset.userId; // "123"
    const role = userDiv.dataset.role; // "admin"
</script>
```

### **Microdata**
```html
<article itemscope itemtype="http://schema.org/Article">
    <h1 itemprop="headline">Article Title</h1>
    <p itemprop="description">Article description...</p>
    <time itemprop="datePublished" datetime="2024-01-15">January 15, 2024</time>
    <div itemprop="author" itemscope itemtype="http://schema.org/Person">
        <span itemprop="name">John Doe</span>
    </div>
</article>
```

### **Custom Elements (Web Components)**
```html
<!-- Define custom element -->
<script>
class MyElement extends HTMLElement {
    constructor() {
        super();
        this.innerHTML = '<h2>Custom Element</h2>';
    }
}
customElements.define('my-element', MyElement);
</script>

<!-- Use custom element -->
<my-element></my-element>
```

### **Template Element**
```html
<template id="user-card">
    <div class="user-card">
        <img src="" alt="User avatar">
        <h3></h3>
        <p></p>
    </div>
</template>

<script>
const template = document.getElementById('user-card');
const clone = template.content.cloneNode(true);
// Populate with data and append to DOM
</script>
```

---

## 🎯 **Practice Projects**

### **Project 1: Personal Portfolio Page**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
</head>
<body>
    <header>
        <h1>John Doe</h1>
        <nav>
            <a href="#about">About</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>
    
    <main>
        <section id="about">
            <h2>About Me</h2>
            <p>I'm a web developer passionate about creating amazing websites.</p>
        </section>
        
        <section id="projects">
            <h2>My Projects</h2>
            <article>
                <h3>Project 1</h3>
                <p>Description of project 1...</p>
            </article>
        </section>
        
        <section id="contact">
            <h2>Contact Me</h2>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                
                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 John Doe. All rights reserved.</p>
    </footer>
</body>
</html>
```

### **Project 2: Blog Post Template**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post Title</title>
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a>
            <a href="/blog">Blog</a>
            <a href="/about">About</a>
        </nav>
    </header>
    
    <main>
        <article>
            <header>
                <h1>Blog Post Title</h1>
                <time datetime="2024-01-15">January 15, 2024</time>
                <p>By <a href="/author/john-doe">John Doe</a></p>
            </header>
            
            <section>
                <p>Introduction paragraph...</p>
                
                <h2>First Section</h2>
                <p>Content for first section...</p>
                
                <h2>Second Section</h2>
                <p>Content for second section...</p>
                
                <blockquote>
                    <p>An important quote from the article.</p>
                    <cite>- Author Name</cite>
                </blockquote>
            </section>
            
            <footer>
                <p>Tags: <a href="/tag/html">HTML</a>, <a href="/tag/web">Web Development</a></p>
            </footer>
        </article>
        
        <aside>
            <h3>Related Posts</h3>
            <ul>
                <li><a href="/post/1">Related Post 1</a></li>
                <li><a href="/post/2">Related Post 2</a></li>
            </ul>
        </aside>
    </main>
    
    <footer>
        <p>&copy; 2024 Blog Name</p>
    </footer>
</body>
</html>
```

---

## 📝 **Exercises and Challenges**

### **Exercise 1: Basic Structure**
Create an HTML page with:
- Proper document structure
- Headings (h1-h6)
- Paragraphs with formatted text
- A simple navigation menu

### **Exercise 2: Forms and Validation**
Create a contact form with:
- Name, email, and message fields
- Proper labels and validation
- Submit button
- Semantic form structure

### **Exercise 3: Semantic Layout**
Build a webpage using only semantic HTML elements:
- Header with navigation
- Main content area
- Sidebar with related links
- Footer with contact information

### **Exercise 4: Accessibility**
Improve the accessibility of a webpage by:
- Adding proper alt text to images
- Using semantic HTML elements
- Adding ARIA labels where needed
- Creating skip navigation links

---

## 🔗 **Related Tutorials**

- [CSS Styling & Layout](css-styling-layout.md) - Style your HTML
- [JavaScript Basics](javascript-basics.md) - Add interactivity
- [HTML Forms & Validation](html-forms-validation.md) - Advanced forms
- [HTML5 Semantic Elements](html5-semantic.md) - Modern HTML structure

---

## 📚 **Additional Resources**

- [MDN HTML Documentation](https://developer.mozilla.org/en-US/docs/Web/HTML)
- [W3Schools HTML Tutorial](https://www.w3schools.com/html/)
- [HTML5 Doctor](http://html5doctor.com/)
- [Web Accessibility Guidelines](https://www.w3.org/WAI/)

---

**Next: [CSS Styling & Layout Tutorial](css-styling-layout.md)**

---

*Master HTML fundamentals and you'll have a solid foundation for all web development!* 