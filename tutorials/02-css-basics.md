# CSS Styling & Layout Tutorial
## Complete Guide from Beginner to Advanced

**Navigation:** [← Previous: HTML Fundamentals](01-html-fundamentals.md) | [Next: JavaScript Basics →](03-javascript-basics.md)

---

## 📚 **Table of Contents**

1. [What is CSS?](#what-is-css)
2. [CSS Syntax and Selectors](#css-syntax-and-selectors)
3. [CSS Box Model](#css-box-model)
4. [Text Styling](#text-styling)
5. [Colors and Backgrounds](#colors-and-backgrounds)
6. [Layout Fundamentals](#layout-fundamentals)
7. [CSS Flexbox](#css-flexbox)
8. [CSS Grid](#css-grid)
9. [Responsive Design](#responsive-design)
10. [CSS Animations](#css-animations)
11. [Practice Projects](#practice-projects)

---

## 🎯 **What is CSS?**

### **Definition**
CSS (Cascading Style Sheets) is a stylesheet language used to describe the presentation of HTML documents. It controls layout, colors, fonts, and animations.

### **Key Concepts**
- **Separation of Concerns**: HTML for structure, CSS for presentation
- **Cascading**: Multiple styles can apply to the same element
- **Specificity**: Determines which styles take precedence
- **Inheritance**: Child elements inherit styles from parents

### **Basic CSS Example**
```html
<!DOCTYPE html>
<html>
<head>
    <style>
        h1 {
            color: blue;
            font-size: 24px;
        }
        p {
            color: gray;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <h1>Styled Heading</h1>
    <p>Styled paragraph text.</p>
</body>
</html>
```

---

## 📝 **CSS Syntax and Selectors**

### **Basic CSS Syntax**
```css
selector {
    property: value;
    property: value;
}
```

### **CSS Selectors**

#### **Element Selectors**
```css
h1 {
    color: blue;
}

p {
    font-size: 16px;
}

div {
    background-color: #f0f0f0;
}
```

#### **Class Selectors**
```css
.highlight {
    background-color: yellow;
}

.button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.error {
    color: red;
    font-weight: bold;
}
```

#### **ID Selectors**
```css
#header {
    background-color: #333;
    color: white;
    padding: 20px;
}

#main-content {
    max-width: 1200px;
    margin: 0 auto;
}
```

#### **Pseudo-class Selectors**
```css
/* Link states */
a:link { color: blue; }
a:visited { color: purple; }
a:hover { color: red; }
a:active { color: orange; }

/* Form states */
input:focus {
    border-color: blue;
    outline: none;
    box-shadow: 0 0 5px rgba(0,0,255,0.3);
}

/* Structural pseudo-classes */
li:first-child { font-weight: bold; }
li:nth-child(odd) { background-color: #f9f9f9; }
```

#### **Combinator Selectors**
```css
/* Descendant selector */
div p { color: blue; }

/* Child selector */
div > p { color: red; }

/* Adjacent sibling selector */
h1 + p { font-weight: bold; }
```

---

## 📦 **CSS Box Model**

### **Box Model Components**
```css
.box {
    /* Content */
    width: 200px;
    height: 100px;
    
    /* Padding */
    padding: 20px;
    
    /* Border */
    border: 2px solid black;
    
    /* Margin */
    margin: 10px;
}
```

### **Box Sizing**
```css
/* Default box-sizing */
.element {
    box-sizing: content-box;
    width: 200px; /* Content width only */
    padding: 20px; /* Adds to total width */
    border: 2px solid black; /* Adds to total width */
    /* Total width = 200 + 40 + 4 = 244px */
}

/* Border-box (recommended) */
.element {
    box-sizing: border-box;
    width: 200px; /* Includes padding and border */
    padding: 20px;
    border: 2px solid black;
    /* Total width = 200px */
}

/* Global border-box */
* {
    box-sizing: border-box;
}
```

### **Margin and Padding**
```css
/* Individual properties */
.element {
    margin-top: 10px;
    margin-right: 20px;
    margin-bottom: 10px;
    margin-left: 20px;
    
    padding-top: 15px;
    padding-right: 25px;
    padding-bottom: 15px;
    padding-left: 25px;
}

/* Shorthand properties */
.element {
    /* margin: top right bottom left; */
    margin: 10px 20px 10px 20px;
    
    /* margin: top/bottom left/right; */
    margin: 10px 20px;
    
    /* margin: all sides; */
    margin: 10px;
    
    /* Same applies to padding */
    padding: 15px 25px;
}
```

---

## 📝 **Text Styling**

### **Font Properties**
```css
.text {
    /* Font family */
    font-family: Arial, Helvetica, sans-serif;
    
    /* Font size */
    font-size: 16px;
    font-size: 1.2em;
    font-size: 120%;
    
    /* Font weight */
    font-weight: normal;
    font-weight: bold;
    font-weight: 400;
    font-weight: 700;
    
    /* Font style */
    font-style: normal;
    font-style: italic;
    
    /* Shorthand */
    font: italic bold 16px/1.5 Arial, sans-serif;
}
```

### **Text Properties**
```css
.text {
    /* Text color */
    color: #333;
    color: rgb(51, 51, 51);
    color: rgba(51, 51, 51, 0.8);
    
    /* Text alignment */
    text-align: left;
    text-align: center;
    text-align: right;
    text-align: justify;
    
    /* Text decoration */
    text-decoration: none;
    text-decoration: underline;
    text-decoration: line-through;
    
    /* Text transform */
    text-transform: none;
    text-transform: uppercase;
    text-transform: lowercase;
    text-transform: capitalize;
    
    /* Line height */
    line-height: 1.5;
    line-height: 150%;
    line-height: 24px;
}
```

---

## 🎨 **Colors and Backgrounds**

### **Color Values**
```css
.element {
    /* Named colors */
    color: red;
    color: blue;
    color: green;
    
    /* Hexadecimal */
    color: #ff0000;
    color: #f00;
    color: #ff0000ff;
    
    /* RGB */
    color: rgb(255, 0, 0);
    color: rgba(255, 0, 0, 0.5);
    
    /* HSL */
    color: hsl(0, 100%, 50%);
    color: hsla(0, 100%, 50%, 0.5);
}
```

### **Background Properties**
```css
.element {
    /* Background color */
    background-color: #f0f0f0;
    
    /* Background image */
    background-image: url('image.jpg');
    
    /* Background repeat */
    background-repeat: repeat;
    background-repeat: no-repeat;
    background-repeat: repeat-x;
    background-repeat: repeat-y;
    
    /* Background position */
    background-position: center;
    background-position: top left;
    background-position: 50% 50%;
    
    /* Background size */
    background-size: cover;
    background-size: contain;
    background-size: 100% 100%;
    
    /* Shorthand */
    background: #f0f0f0 url('image.jpg') no-repeat center/cover;
}
```

### **Gradients**
```css
.element {
    /* Linear gradient */
    background: linear-gradient(to right, #ff0000, #00ff00);
    background: linear-gradient(45deg, #ff0000, #00ff00);
    
    /* Radial gradient */
    background: radial-gradient(circle, #ff0000, #00ff00);
    
    /* Multiple color stops */
    background: linear-gradient(to right, 
        #ff0000 0%, 
        #ffff00 25%, 
        #00ff00 50%, 
        #00ffff 75%, 
        #0000ff 100%);
}
```

---

## 🏗️ **Layout Fundamentals**

### **Display Property**
```css
.element {
    /* Block elements */
    display: block;
    
    /* Inline elements */
    display: inline;
    
    /* Inline-block elements */
    display: inline-block;
    
    /* Flexbox */
    display: flex;
    display: inline-flex;
    
    /* Grid */
    display: grid;
    display: inline-grid;
    
    /* Hidden */
    display: none;
}
```

### **Positioning**
```css
.element {
    /* Static (default) */
    position: static;
    
    /* Relative */
    position: relative;
    top: 10px;
    left: 20px;
    
    /* Absolute */
    position: absolute;
    top: 0;
    right: 0;
    
    /* Fixed */
    position: fixed;
    top: 0;
    left: 0;
    
    /* Sticky */
    position: sticky;
    top: 0;
}
```

---

## 🔄 **CSS Flexbox**

### **Flex Container Properties**
```css
.flex-container {
    display: flex;
    
    /* Direction */
    flex-direction: row;
    flex-direction: row-reverse;
    flex-direction: column;
    flex-direction: column-reverse;
    
    /* Wrap */
    flex-wrap: nowrap;
    flex-wrap: wrap;
    flex-wrap: wrap-reverse;
    
    /* Shorthand */
    flex-flow: row wrap;
    
    /* Justify content */
    justify-content: flex-start;
    justify-content: flex-end;
    justify-content: center;
    justify-content: space-between;
    justify-content: space-around;
    justify-content: space-evenly;
    
    /* Align items */
    align-items: stretch;
    align-items: flex-start;
    align-items: flex-end;
    align-items: center;
    align-items: baseline;
}
```

### **Flex Item Properties**
```css
.flex-item {
    /* Order */
    order: 0;
    
    /* Flex grow */
    flex-grow: 0;
    
    /* Flex shrink */
    flex-shrink: 1;
    
    /* Flex basis */
    flex-basis: auto;
    
    /* Shorthand */
    flex: 0 1 auto; /* grow shrink basis */
    flex: 1; /* flex: 1 1 0% */
    flex: auto; /* flex: 1 1 auto */
    flex: none; /* flex: 0 0 auto */
    
    /* Align self */
    align-self: auto;
    align-self: flex-start;
    align-self: flex-end;
    align-self: center;
    align-self: baseline;
    align-self: stretch;
}
```

### **Flexbox Examples**
```css
/* Navigation menu */
.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
}

/* Card layout */
.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.card {
    flex: 1 1 300px;
    min-height: 200px;
}

/* Centered content */
.centered {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
```

---

## 📐 **CSS Grid**

### **Grid Container Properties**
```css
.grid-container {
    display: grid;
    
    /* Grid template columns */
    grid-template-columns: 200px 200px 200px;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-columns: repeat(3, 1fr);
    grid-template-columns: 200px 1fr 2fr;
    
    /* Grid template rows */
    grid-template-rows: 100px 100px 100px;
    grid-template-rows: repeat(3, 1fr);
    
    /* Grid template areas */
    grid-template-areas: 
        "header header header"
        "sidebar main main"
        "footer footer footer";
    
    /* Gap */
    gap: 20px;
    row-gap: 20px;
    column-gap: 20px;
    
    /* Justify items */
    justify-items: start;
    justify-items: end;
    justify-items: center;
    justify-items: stretch;
    
    /* Align items */
    align-items: start;
    align-items: end;
    align-items: center;
    align-items: stretch;
}
```

### **Grid Item Properties**
```css
.grid-item {
    /* Grid column */
    grid-column: 1 / 3;
    grid-column: 1 / span 2;
    grid-column-start: 1;
    grid-column-end: 3;
    
    /* Grid row */
    grid-row: 1 / 3;
    grid-row: 1 / span 2;
    grid-row-start: 1;
    grid-row-end: 3;
    
    /* Grid area */
    grid-area: header;
    grid-area: 1 / 1 / 3 / 3;
    
    /* Justify self */
    justify-self: start;
    justify-self: end;
    justify-self: center;
    justify-self: stretch;
    
    /* Align self */
    align-self: start;
    align-self: end;
    align-self: center;
    align-self: stretch;
}
```

### **Grid Examples**
```css
/* Layout with header, sidebar, main, footer */
.layout {
    display: grid;
    grid-template-areas: 
        "header header"
        "sidebar main"
        "footer footer";
    grid-template-columns: 250px 1fr;
    grid-template-rows: 80px 1fr 100px;
    min-height: 100vh;
}

.header { grid-area: header; }
.sidebar { grid-area: sidebar; }
.main { grid-area: main; }
.footer { grid-area: footer; }

/* Responsive grid */
.responsive-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
}
```

---

## 📱 **Responsive Design**

### **Media Queries**
```css
/* Mobile first approach */
.container {
    width: 100%;
    padding: 1rem;
}

/* Tablet */
@media (min-width: 768px) {
    .container {
        width: 750px;
        margin: 0 auto;
    }
}

/* Desktop */
@media (min-width: 1024px) {
    .container {
        width: 1000px;
    }
}

/* Large desktop */
@media (min-width: 1200px) {
    .container {
        width: 1200px;
    }
}

/* Print styles */
@media print {
    .no-print {
        display: none;
    }
    
    body {
        font-size: 12pt;
        line-height: 1.4;
    }
}

/* Dark mode */
@media (prefers-color-scheme: dark) {
    body {
        background-color: #222;
        color: #fff;
    }
}
```

### **Responsive Typography**
```css
/* Fluid typography */
h1 {
    font-size: clamp(2rem, 5vw, 4rem);
}

p {
    font-size: clamp(1rem, 2vw, 1.2rem);
    line-height: clamp(1.4, 2vw, 1.6);
}
```

---

## ✨ **CSS Animations**

### **Transitions**
```css
.button {
    background-color: blue;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.button:hover {
    background-color: darkblue;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

/* Multiple properties */
.element {
    transition: 
        background-color 0.3s ease,
        transform 0.2s ease-out,
        opacity 0.5s ease-in;
}
```

### **Animations**
```css
/* Keyframes */
@keyframes slideIn {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-30px);
    }
    60% {
        transform: translateY(-15px);
    }
}

/* Animation properties */
.animated-element {
    animation-name: slideIn;
    animation-duration: 1s;
    animation-timing-function: ease-out;
    animation-delay: 0.5s;
    animation-iteration-count: 1;
    animation-direction: normal;
    animation-fill-mode: both;
    
    /* Shorthand */
    animation: slideIn 1s ease-out 0.5s 1 normal both;
}

/* Infinite animation */
.loading {
    animation: spin 2s linear infinite;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
```

### **Transform Properties**
```css
.element {
    /* Translate */
    transform: translateX(50px);
    transform: translateY(-20px);
    transform: translate(50px, -20px);
    
    /* Scale */
    transform: scale(1.5);
    transform: scaleX(2);
    transform: scaleY(0.5);
    
    /* Rotate */
    transform: rotate(45deg);
    transform: rotateX(45deg);
    transform: rotateY(45deg);
    
    /* Skew */
    transform: skew(10deg);
    transform: skewX(10deg);
    transform: skewY(10deg);
    
    /* Multiple transforms */
    transform: translate(50px, -20px) rotate(45deg) scale(1.2);
}
```

---

## 🎯 **Practice Projects**

### **Project 1: Responsive Card Layout**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Layout</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .card-text {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .card-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .card-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-grid">
            <div class="card">
                <div class="card-image">📱</div>
                <div class="card-content">
                    <h3 class="card-title">Mobile Design</h3>
                    <p class="card-text">Create beautiful, responsive designs that work perfectly on all devices.</p>
                    <a href="#" class="card-button">Learn More</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-image">🎨</div>
                <div class="card-content">
                    <h3 class="card-title">Modern UI</h3>
                    <p class="card-text">Design modern user interfaces with the latest CSS techniques.</p>
                    <a href="#" class="card-button">Learn More</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-image">⚡</div>
                <div class="card-content">
                    <h3 class="card-title">Performance</h3>
                    <p class="card-text">Optimize your CSS for lightning-fast loading and smooth animations.</p>
                    <a href="#" class="card-button">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
```

---

## 📝 **Exercises and Challenges**

### **Exercise 1: Basic Layout**
Create a responsive layout with:
- Header with navigation
- Main content area with sidebar
- Footer
- Use Flexbox or Grid for layout

### **Exercise 2: Card Component**
Build a reusable card component with:
- Hover effects
- Responsive design
- Smooth transitions

### **Exercise 3: Animated Elements**
Create animations for:
- Loading spinner
- Button hover effects
- Page transitions

### **Exercise 4: Responsive Design**
Build a responsive website that:
- Works on mobile, tablet, and desktop
- Uses mobile-first approach
- Implements responsive typography

---

## 🔗 **Related Tutorials**

- [HTML Fundamentals](01-html-fundamentals.md) - Structure your content
- [JavaScript Basics](03-javascript-basics.md) - Add interactivity
- [CSS Flexbox Deep Dive](04-css-flexbox-deep-dive.md) - Master Flexbox
- [CSS Grid Mastery](05-css-grid-mastery.md) - Advanced Grid layouts

---

## 📚 **Additional Resources**

- [MDN CSS Documentation](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [CSS-Tricks](https://css-tricks.com/)
- [Flexbox Froggy](https://flexboxfroggy.com/) - Learn Flexbox
- [Grid Garden](https://cssgridgarden.com/) - Learn CSS Grid
- [Can I Use](https://caniuse.com/) - Browser compatibility

---

**Next: [JavaScript Basics Tutorial](03-javascript-basics.md)**

---

*Master CSS styling and layout to create beautiful, responsive web designs!* 