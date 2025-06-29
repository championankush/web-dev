# HTML5 Semantic Elements Tutorial
## Modern HTML Structure and Best Practices

**Navigation:** [← Previous: HTML Forms & Validation](04-html-forms-validation.md) | [Next: CSS Styling & Layout →](02-css-styling-layout.md)

---

## 📚 Table of Contents

1. [Introduction to HTML5 Semantic Elements](#introduction-to-html5-semantic-elements)
2. [Document Structure Elements](#document-structure-elements)
3. [Content Sectioning Elements](#content-sectioning-elements)
4. [Text Content Elements](#text-content-elements)
5. [Inline Text Semantics](#inline-text-semantics)
6. [Image and Multimedia Elements](#image-and-multimedia-elements)
7. [Embedded Content Elements](#embedded-content-elements)
8. [Interactive Elements](#interactive-elements)
9. [Form Elements](#form-elements)
10. [Data Elements](#data-elements)
11. [Best Practices](#best-practices)
12. [Practice Projects](#practice-projects)
13. [Exercises & Challenges](#exercises--challenges)

---

## 1. Introduction to HTML5 Semantic Elements

### What are Semantic Elements?
Semantic elements clearly describe their meaning to both the browser and the developer. They make HTML more readable and accessible.

### Benefits of Semantic HTML
- **Accessibility**: Screen readers can better understand the content structure
- **SEO**: Search engines can better understand your content
- **Maintainability**: Code is easier to read and maintain
- **Future-proof**: Better compatibility with future web standards

### Before HTML5 (Non-semantic)
```html
<div id="header">
    <div id="nav">
        <!-- Navigation content -->
    </div>
</div>
<div id="main">
    <div id="content">
        <!-- Main content -->
    </div>
    <div id="sidebar">
        <!-- Sidebar content -->
    </div>
</div>
<div id="footer">
    <!-- Footer content -->
</div>
```

### After HTML5 (Semantic)
```html
<header>
    <nav>
        <!-- Navigation content -->
    </nav>
</header>
<main>
    <article>
        <!-- Main content -->
    </article>
    <aside>
        <!-- Sidebar content -->
    </aside>
</main>
<footer>
    <!-- Footer content -->
</footer>
```

---

## 2. Document Structure Elements

### `<html>`
The root element of an HTML document.
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
</head>
<body>
    <!-- Content goes here -->
</body>
</html>
```

### `<head>`
Contains metadata about the document.
```html
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A description of your page">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Your Name">
    <title>Page Title</title>
    <link rel="stylesheet" href="styles.css">
</head>
```

### `<body>`
Contains the visible content of the document.
```html
<body>
    <header>
        <!-- Header content -->
    </header>
    
    <main>
        <!-- Main content -->
    </main>
    
    <footer>
        <!-- Footer content -->
    </footer>
</body>
```

---

## 3. Content Sectioning Elements

### `<header>`
Represents introductory content, typically containing navigation and heading elements.
```html
<header>
    <h1>Website Title</h1>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</header>
```

### `<nav>`
Represents a section of navigation links.
```html
<nav>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>

<!-- Multiple navigation sections -->
<nav aria-label="Primary navigation">
    <!-- Main navigation -->
</nav>
<nav aria-label="Secondary navigation">
    <!-- Secondary navigation -->
</nav>
```

### `<main>`
Represents the main content of the document. There should be only one `<main>` element per page.
```html
<main>
    <h1>Main Content Title</h1>
    <p>This is the main content of the page.</p>
    
    <article>
        <h2>Article Title</h2>
        <p>Article content...</p>
    </article>
</main>
```

### `<article>`
Represents a self-contained composition that could be distributed independently.
```html
<article>
    <header>
        <h2>Article Title</h2>
        <time datetime="2024-01-15">January 15, 2024</time>
    </header>
    
    <p>Article content...</p>
    
    <footer>
        <p>Author: John Doe</p>
        <p>Category: Technology</p>
    </footer>
</article>
```

### `<section>`
Represents a standalone section of a document.
```html
<section>
    <h2>About Us</h2>
    <p>Information about our company...</p>
</section>

<section>
    <h2>Our Services</h2>
    <ul>
        <li>Web Design</li>
        <li>Development</li>
        <li>Consulting</li>
    </ul>
</section>
```

### `<aside>`
Represents content that is tangentially related to the main content.
```html
<main>
    <article>
        <h1>Main Article</h1>
        <p>Main content...</p>
    </article>
    
    <aside>
        <h3>Related Articles</h3>
        <ul>
            <li><a href="#">Related Article 1</a></li>
            <li><a href="#">Related Article 2</a></li>
        </ul>
    </aside>
</main>
```

### `<footer>`
Represents the footer of a document or section.
```html
<footer>
    <p>&copy; 2024 My Website. All rights reserved.</p>
    <nav>
        <ul>
            <li><a href="#privacy">Privacy Policy</a></li>
            <li><a href="#terms">Terms of Service</a></li>
        </ul>
    </nav>
</footer>
```

---

## 4. Text Content Elements

### `<h1>` to `<h6>`
Heading elements represent different levels of headings.
```html
<h1>Main Page Title</h1>
<h2>Section Title</h2>
<h3>Subsection Title</h3>
<h4>Sub-subsection Title</h4>
<h5>Minor Heading</h5>
<h6>Smallest Heading</h6>
```

### `<p>`
Represents a paragraph of text.
```html
<p>This is a paragraph of text. It can contain multiple sentences and will be displayed as a block of text.</p>
<p>This is another paragraph. Each paragraph is separated from others by default spacing.</p>
```

### `<blockquote>`
Represents a section that is quoted from another source.
```html
<blockquote cite="https://example.com/source">
    <p>This is a quote from another source.</p>
    <footer>— <cite>Author Name</cite></footer>
</blockquote>
```

### `<pre>`
Represents preformatted text that should be displayed exactly as written.
```html
<pre>
function hello() {
    console.log("Hello, World!");
}
</pre>
```

### `<code>`
Represents a fragment of computer code.
```html
<p>Use the <code>console.log()</code> function to print to the console.</p>
```

### `<ol>`, `<ul>`, `<li>`
Ordered and unordered lists.
```html
<!-- Ordered list -->
<ol>
    <li>First item</li>
    <li>Second item</li>
    <li>Third item</li>
</ol>

<!-- Unordered list -->
<ul>
    <li>Apple</li>
    <li>Banana</li>
    <li>Orange</li>
</ul>

<!-- Nested lists -->
<ul>
    <li>Fruits
        <ul>
            <li>Apple</li>
            <li>Banana</li>
        </ul>
    </li>
    <li>Vegetables
        <ul>
            <li>Carrot</li>
            <li>Broccoli</li>
        </ul>
    </li>
</ul>
```

### `<dl>`, `<dt>`, `<dd>`
Description lists for terms and their definitions.
```html
<dl>
    <dt>HTML</dt>
    <dd>HyperText Markup Language</dd>
    
    <dt>CSS</dt>
    <dd>Cascading Style Sheets</dd>
    
    <dt>JavaScript</dt>
    <dd>A programming language for the web</dd>
</dl>
```

---

## 5. Inline Text Semantics

### `<strong>` and `<em>`
Emphasis elements.
```html
<p>This is <strong>important</strong> text.</p>
<p>This is <em>emphasized</em> text.</p>
```

### `<mark>`
Represents text that is highlighted for reference purposes.
```html
<p>Search results for <mark>HTML5</mark> semantic elements.</p>
```

### `<small>`
Represents side comments and small print.
```html
<p>Regular text <small>Small print or side comment</small></p>
```

### `<del>` and `<ins>`
Represents deleted and inserted text.
```html
<p>Original price: <del>$100</del> New price: <ins>$80</ins></p>
```

### `<sub>` and `<sup>`
Subscript and superscript text.
```html
<p>H<sub>2</sub>O (water)</p>
<p>E = mc<sup>2</sup> (Einstein's equation)</p>
```

### `<abbr>`
Represents an abbreviation or acronym.
```html
<p><abbr title="HyperText Markup Language">HTML</abbr> is the standard markup language.</p>
```

### `<cite>`
Represents the title of a creative work.
```html
<p>As stated in <cite>The Art of Web Design</cite> by John Doe...</p>
```

### `<time>`
Represents a specific period in time.
```html
<p>The event is on <time datetime="2024-02-15T20:00">February 15th at 8 PM</time>.</p>
<p>Today is <time datetime="2024-01-15">January 15, 2024</time>.</p>
```

### `<address>`
Represents contact information.
```html
<address>
    <p>Contact us at:</p>
    <p>123 Main Street<br>
    City, State 12345<br>
    Phone: (555) 123-4567<br>
    Email: <a href="mailto:info@example.com">info@example.com</a></p>
</address>
```

---

## 6. Image and Multimedia Elements

### `<figure>` and `<figcaption>`
Represents self-contained content with an optional caption.
```html
<figure>
    <img src="image.jpg" alt="Description of the image">
    <figcaption>Caption for the image</figcaption>
</figure>

<figure>
    <video controls>
        <source src="video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <figcaption>Video caption</figcaption>
</figure>
```

### `<picture>`
Provides multiple sources for an image.
```html
<picture>
    <source media="(min-width: 800px)" srcset="large.jpg">
    <source media="(min-width: 400px)" srcset="medium.jpg">
    <img src="small.jpg" alt="Responsive image">
</picture>
```

---

## 7. Embedded Content Elements

### `<iframe>`
Embeds another HTML page within the current page.
```html
<iframe src="https://www.example.com" 
        width="600" 
        height="400" 
        title="Embedded content">
    Your browser does not support iframes.
</iframe>
```

### `<embed>` and `<object>`
Embeds external content.
```html
<embed src="video.swf" type="application/x-shockwave-flash">

<object data="document.pdf" type="application/pdf" width="600" height="400">
    <p>Your browser does not support PDFs.</p>
</object>
```

---

## 8. Interactive Elements

### `<details>` and `<summary>`
Creates a disclosure widget.
```html
<details>
    <summary>Click to expand</summary>
    <p>This content is hidden by default and can be shown by clicking the summary.</p>
</details>
```

### `<dialog>`
Represents a dialog box or modal.
```html
<dialog id="myDialog">
    <h2>Dialog Title</h2>
    <p>Dialog content goes here.</p>
    <button onclick="document.getElementById('myDialog').close()">Close</button>
</dialog>

<button onclick="document.getElementById('myDialog').showModal()">Open Dialog</button>
```

---

## 9. Form Elements

### `<fieldset>` and `<legend>`
Groups related form controls.
```html
<form>
    <fieldset>
        <legend>Personal Information</legend>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </fieldset>
    
    <fieldset>
        <legend>Preferences</legend>
        <label>
            <input type="checkbox" name="newsletter"> Subscribe to newsletter
        </label>
    </fieldset>
</form>
```

### `<output>`
Represents the result of a calculation.
```html
<form oninput="result.value = parseInt(a.value) + parseInt(b.value)">
    <input type="number" id="a" name="a" value="0"> +
    <input type="number" id="b" name="b" value="0"> =
    <output name="result" for="a b">0</output>
</form>
```

---

## 10. Data Elements

### `<data>`
Links content with machine-readable translations.
```html
<p>Product: <data value="12345">Widget Pro</data></p>
```

### `<meter>`
Represents a scalar measurement within a known range.
```html
<meter value="0.6" min="0" max="1">60%</meter>
<meter value="75" min="0" max="100" low="25" high="75" optimum="50">75%</meter>
```

### `<progress>`
Represents the completion progress of a task.
```html
<progress value="70" max="100">70%</progress>
```

---

## 11. Best Practices

### 1. Use Semantic Elements Appropriately
```html
<!-- Good -->
<article>
    <header>
        <h1>Article Title</h1>
        <time datetime="2024-01-15">January 15, 2024</time>
    </header>
    <p>Article content...</p>
</article>

<!-- Avoid -->
<div class="article">
    <div class="header">
        <h1>Article Title</h1>
        <span>January 15, 2024</span>
    </div>
    <p>Article content...</p>
</div>
```

### 2. Proper Heading Hierarchy
```html
<h1>Page Title</h1>
<h2>Section Title</h2>
<h3>Subsection Title</h3>
<h2>Another Section</h2>
<h3>Another Subsection</h3>
```

### 3. Use ARIA Labels When Needed
```html
<nav aria-label="Primary navigation">
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
    </ul>
</nav>

<nav aria-label="Secondary navigation">
    <ul>
        <li><a href="#privacy">Privacy</a></li>
        <li><a href="#terms">Terms</a></li>
    </ul>
</nav>
```

### 4. Provide Alternative Text
```html
<img src="image.jpg" alt="A detailed description of the image content">
<img src="decorative.jpg" alt=""> <!-- Empty alt for decorative images -->
```

### 5. Use Landmark Roles
```html
<header role="banner">
    <!-- Header content -->
</header>

<nav role="navigation">
    <!-- Navigation content -->
</nav>

<main role="main">
    <!-- Main content -->
</main>

<aside role="complementary">
    <!-- Sidebar content -->
</aside>

<footer role="contentinfo">
    <!-- Footer content -->
</footer>
```

---

## 12. Practice Projects

### Project 1: Semantic Blog Layout
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semantic Blog</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        header {
            background: #333;
            color: white;
            padding: 1rem;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        article {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        aside {
            background: #f5f5f5;
            padding: 1rem;
            border-radius: 8px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }

        .article-meta {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .tag {
            background: #007bff;
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>My Blog</h1>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <article>
                <header>
                    <h2>Getting Started with HTML5 Semantic Elements</h2>
                    <div class="article-meta">
                        <time datetime="2024-01-15">January 15, 2024</time>
                        <span>by <cite>John Doe</cite></span>
                    </div>
                </header>
                
                <p>HTML5 semantic elements provide a way to create more meaningful and accessible web pages...</p>
                
                <footer>
                    <span class="tag">HTML</span>
                    <span class="tag">Semantics</span>
                    <span class="tag">Web Development</span>
                </footer>
            </article>

            <article>
                <header>
                    <h2>CSS Grid vs Flexbox: When to Use Each</h2>
                    <div class="article-meta">
                        <time datetime="2024-01-10">January 10, 2024</time>
                        <span>by <cite>Jane Smith</cite></span>
                    </div>
                </header>
                
                <p>Both CSS Grid and Flexbox are powerful layout tools, but they serve different purposes...</p>
                
                <footer>
                    <span class="tag">CSS</span>
                    <span class="tag">Layout</span>
                    <span class="tag">Grid</span>
                </footer>
            </article>
        </section>

        <aside>
            <h3>About the Author</h3>
            <p>John Doe is a web developer with over 10 years of experience in creating accessible and semantic web applications.</p>
            
            <h3>Recent Posts</h3>
            <ul>
                <li><a href="#">JavaScript Best Practices</a></li>
                <li><a href="#">Responsive Design Tips</a></li>
                <li><a href="#">Web Accessibility Guide</a></li>
            </ul>
            
            <h3>Categories</h3>
            <ul>
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">JavaScript</a></li>
                <li><a href="#">Accessibility</a></li>
            </ul>
        </aside>
    </main>

    <footer>
        <p>&copy; 2024 My Blog. All rights reserved.</p>
        <nav>
            <ul>
                <li><a href="#privacy">Privacy Policy</a></li>
                <li><a href="#terms">Terms of Service</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>
```

### Project 2: Semantic Portfolio
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - John Doe</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        header {
            background: #2c3e50;
            color: white;
            padding: 2rem;
            text-align: center;
        }

        nav {
            background: #34495e;
            padding: 1rem;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        section {
            margin-bottom: 3rem;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .project {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .project img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .project-content {
            padding: 1.5rem;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .skill {
            background: #3498db;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>John Doe</h1>
        <p>Web Developer & Designer</p>
    </header>

    <nav>
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <main>
        <section id="about">
            <h2>About Me</h2>
            <p>I'm a passionate web developer with expertise in creating modern, accessible, and user-friendly web applications. I specialize in HTML5, CSS3, JavaScript, and modern web technologies.</p>
        </section>

        <section id="projects">
            <h2>Featured Projects</h2>
            <div class="project-grid">
                <article class="project">
                    <figure>
                        <img src="https://via.placeholder.com/300x200" alt="E-commerce Website">
                        <figcaption>E-commerce Platform</figcaption>
                    </figure>
                    <div class="project-content">
                        <h3>E-commerce Website</h3>
                        <p>A fully responsive e-commerce platform built with modern web technologies.</p>
                        <div class="skills">
                            <span class="skill">HTML5</span>
                            <span class="skill">CSS3</span>
                            <span class="skill">JavaScript</span>
                            <span class="skill">React</span>
                        </div>
                    </div>
                </article>

                <article class="project">
                    <figure>
                        <img src="https://via.placeholder.com/300x200" alt="Portfolio Website">
                        <figcaption>Portfolio Website</figcaption>
                    </figure>
                    <div class="project-content">
                        <h3>Portfolio Website</h3>
                        <p>A semantic and accessible portfolio website showcasing creative work.</p>
                        <div class="skills">
                            <span class="skill">HTML5</span>
                            <span class="skill">CSS Grid</span>
                            <span class="skill">Flexbox</span>
                            <span class="skill">Accessibility</span>
                        </div>
                    </div>
                </article>

                <article class="project">
                    <figure>
                        <img src="https://via.placeholder.com/300x200" alt="Blog Platform">
                        <figcaption>Blog Platform</figcaption>
                    </figure>
                    <div class="project-content">
                        <h3>Blog Platform</h3>
                        <p>A content management system for bloggers with advanced features.</p>
                        <div class="skills">
                            <span class="skill">PHP</span>
                            <span class="skill">MySQL</span>
                            <span class="skill">JavaScript</span>
                            <span class="skill">WordPress</span>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <section id="skills">
            <h2>Skills & Technologies</h2>
            <div class="skills">
                <span class="skill">HTML5</span>
                <span class="skill">CSS3</span>
                <span class="skill">JavaScript</span>
                <span class="skill">React</span>
                <span class="skill">Node.js</span>
                <span class="skill">PHP</span>
                <span class="skill">MySQL</span>
                <span class="skill">Git</span>
                <span class="skill">Accessibility</span>
                <span class="skill">Responsive Design</span>
            </div>
        </section>
    </main>

    <footer>
        <h3>Contact Information</h3>
        <address class="contact-info">
            <p>Email: <a href="mailto:john@example.com" style="color: white;">john@example.com</a></p>
            <p>Phone: <a href="tel:+1234567890" style="color: white;">(123) 456-7890</a></p>
            <p>Location: New York, NY</p>
        </address>
        <p>&copy; 2024 John Doe. All rights reserved.</p>
    </footer>
</body>
</html>
```

---

## 13. Exercises & Challenges

### Beginner Exercises
1. Convert a non-semantic HTML page to use semantic elements
2. Create a simple blog post with proper semantic structure
3. Build a contact page with semantic form elements

### Intermediate Exercises
1. Create a multi-page website with consistent semantic structure
2. Build a portfolio site with proper sectioning
3. Design a news article with semantic markup

### Advanced Exercises
1. Create a complex web application with semantic structure
2. Build an accessible e-commerce product page
3. Design a documentation site with semantic navigation

### Challenge Projects
1. **Semantic News Website**: Create a complete news site with articles, categories, and comments
2. **E-commerce Product Catalog**: Build a product listing with filters and search
3. **Educational Platform**: Create a learning management system with courses and lessons

---

## Related Tutorials & Next Steps

- [CSS Styling & Layout](02-css-styling-layout.md) - Style your semantic HTML
- [HTML Forms & Validation](04-html-forms-validation.md) - Back to forms
- [JavaScript Basics](03-javascript-basics.md) - Add interactivity
- [HTML Fundamentals](01-html-fundamentals.md) - Back to HTML basics

---

**Next: [CSS Styling & Layout →](02-css-styling-layout.md)**

---

*Master HTML5 semantic elements to create accessible, maintainable, and SEO-friendly websites!* 