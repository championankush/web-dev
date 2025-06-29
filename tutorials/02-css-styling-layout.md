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
10. [CSS Animations and Transitions](#css-animations-and-transitions)
11. [Advanced CSS Techniques](#advanced-css-techniques)
12. [CSS Best Practices](#css-best-practices)
13. [Practice Projects](#practice-projects)

---

## 🎯 **What is CSS?**

### **Definition**
CSS (Cascading Style Sheets) is a stylesheet language used to describe the presentation of a document written in HTML. CSS describes how elements should be rendered on screen, on paper, in speech, or on other media.

### **Key Concepts**
- **Separation of Concerns**: HTML for structure, CSS for presentation
- **Cascading**: Multiple styles can apply to the same element
- **Specificity**: Determines which styles take precedence
- **Inheritance**: Child elements inherit styles from parent elements

### **How CSS Works**
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

#footer {
    background-color: #222;
    color: white;
    text-align: center;
    padding: 20px;
}
```

#### **Attribute Selectors**
```css
/* Elements with specific attribute */
input[type="text"] {
    border: 1px solid #ccc;
    padding: 8px;
}

/* Elements with attribute containing value */
a[href*="example"] {
    color: blue;
}

/* Elements with attribute starting with value */
a[href^="https"] {
    color: green;
}

/* Elements with attribute ending with value */
a[href$=".pdf"] {
    color: red;
}
```

#### **Pseudo-class Selectors**
```css
/* Link states */
a:link {
    color: blue;
}

a:visited {
    color: purple;
}

a:hover {
    color: red;
    text-decoration: underline;
}

a:active {
    color: orange;
}

/* Form states */
input:focus {
    border-color: blue;
    outline: none;
    box-shadow: 0 0 5px rgba(0,0,255,0.3);
}

input:disabled {
    background-color: #f5f5f5;
    color: #999;
}

/* Structural pseudo-classes */
li:first-child {
    font-weight: bold;
}

li:last-child {
    border-bottom: none;
}

li:nth-child(odd) {
    background-color: #f9f9f9;
}

li:nth-child(even) {
    background-color: #fff;
}
```

#### **Pseudo-element Selectors**
```css
/* First letter */
p::first-letter {
    font-size: 2em;
    font-weight: bold;
    color: red;
}

/* First line */
p::first-line {
    font-weight: bold;
}

/* Before and after content */
.button::before {
    content: "→ ";
}

.button::after {
    content: " ←";
}

/* Selection */
::selection {
    background-color: yellow;
    color: black;
}
```

#### **Combinator Selectors**
```css
/* Descendant selector */
div p {
    color: blue;
}

/* Child selector */
div > p {
    color: red;
}

/* Adjacent sibling selector */
h1 + p {
    font-weight: bold;
}

/* General sibling selector */
h1 ~ p {
    color: gray;
}
```

### **CSS Specificity**
```css
/* Specificity order (highest to lowest): */
/* 1. Inline styles */
/* 2. ID selectors */
/* 3. Class selectors, attribute selectors, pseudo-classes */
/* 4. Element selectors, pseudo-elements */

#header .title { /* Specificity: 0,1,1,0 */
    color: blue;
}

.title { /* Specificity: 0,0,1,0 */
    color: red;
}

/* The first rule wins due to higher specificity */
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

### **Margin Collapse**
```css
/* Vertical margins collapse between adjacent elements */
.box1 {
    margin-bottom: 20px;
}

.box2 {
    margin-top: 30px;
}

/* Result: 30px margin between boxes (not 50px) */
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
    font-style: oblique;
    
    /* Font variant */
    font-variant: normal;
    font-variant: small-caps;
    
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
    text-decoration: overline;
    
    /* Text transform */
    text-transform: none;
    text-transform: uppercase;
    text-transform: lowercase;
    text-transform: capitalize;
    
    /* Text indent */
    text-indent: 20px;
    
    /* Letter spacing */
    letter-spacing: 2px;
    
    /* Word spacing */
    word-spacing: 5px;
    
    /* Line height */
    line-height: 1.5;
    line-height: 150%;
    line-height: 24px;
}
```

### **Web Fonts**
```css
/* Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

/* Local fonts */
@font-face {
    font-family: 'CustomFont';
    src: url('fonts/custom-font.woff2') format('woff2'),
         url('fonts/custom-font.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}

body {
    font-family: 'Roboto', Arial, sans-serif;
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
    
    /* Current color */
    color: currentColor;
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
    background-position: 20px 30px;
    
    /* Background size */
    background-size: cover;
    background-size: contain;
    background-size: 100% 100%;
    background-size: 200px 150px;
    
    /* Background attachment */
    background-attachment: scroll;
    background-attachment: fixed;
    background-attachment: local;
    
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
    background: linear-gradient(to bottom, #ff0000 0%, #00ff00 100%);
    
    /* Radial gradient */
    background: radial-gradient(circle, #ff0000, #00ff00);
    background: radial-gradient(ellipse at center, #ff0000, #00ff00);
    
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
    
    /* Table display */
    display: table;
    display: table-cell;
    display: table-row;
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

### **Float and Clear**
```css
.element {
    /* Float */
    float: left;
    float: right;
    float: none;
    
    /* Clear */
    clear: left;
    clear: right;
    clear: both;
    clear: none;
}

/* Clearfix */
.clearfix::after {
    content: "";
    display: table;
    clear: both;
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
    
    /* Align content */
    align-content: flex-start;
    align-content: flex-end;
    align-content: center;
    align-content: space-between;
    align-content: space-around;
    align-content: stretch;
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
    
    /* Shorthand */
    grid-template: 
        "header header header" 100px
        "sidebar main main" 1fr
        "footer footer footer" 100px
        / 200px 1fr 1fr;
    
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
    
    /* Justify content */
    justify-content: start;
    justify-content: end;
    justify-content: center;
    justify-content: stretch;
    justify-content: space-around;
    justify-content: space-between;
    justify-content: space-evenly;
    
    /* Align content */
    align-content: start;
    align-content: end;
    align-content: center;
    align-content: stretch;
    align-content: space-around;
    align-content: space-between;
    align-content: space-evenly;
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

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
```

### **Responsive Images**
```css
.responsive-image {
    max-width: 100%;
    height: auto;
}

/* Picture element with CSS */
.responsive-bg {
    background-image: url('small.jpg');
}

@media (min-width: 768px) {
    .responsive-bg {
        background-image: url('medium.jpg');
    }
}

@media (min-width: 1024px) {
    .responsive-bg {
        background-image: url('large.jpg');
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

## ✨ **CSS Animations and Transitions**

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

/* Transition timing functions */
.element {
    transition-timing-function: ease;
    transition-timing-function: ease-in;
    transition-timing-function: ease-out;
    transition-timing-function: ease-in-out;
    transition-timing-function: linear;
    transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
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
    animation-play-state: running;
    
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
    transform: translateZ(100px);
    transform: translate3d(50px, -20px, 100px);
    
    /* Scale */
    transform: scale(1.5);
    transform: scaleX(2);
    transform: scaleY(0.5);
    transform: scale(1.5, 0.5);
    
    /* Rotate */
    transform: rotate(45deg);
    transform: rotateX(45deg);
    transform: rotateY(45deg);
    transform: rotateZ(45deg);
    
    /* Skew */
    transform: skew(10deg);
    transform: skewX(10deg);
    transform: skewY(10deg);
    
    /* Multiple transforms */
    transform: translate(50px, -20px) rotate(45deg) scale(1.2);
}
```

---

## 🚀 **Advanced CSS Techniques**

### **CSS Variables (Custom Properties)**
```css
:root {
    --primary-color: #007bff;
    --secondary-color: #6c757d;
    --success-color: #28a745;
    --danger-color: #dc3545;
    --warning-color: #ffc107;
    --info-color: #17a2b8;
    --light-color: #f8f9fa;
    --dark-color: #343a40;
    
    --font-family: 'Arial', sans-serif;
    --font-size-base: 16px;
    --line-height-base: 1.5;
    
    --spacing-unit: 1rem;
    --border-radius: 0.25rem;
    --box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.button {
    background-color: var(--primary-color);
    font-family: var(--font-family);
    padding: var(--spacing-unit);
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
}

/* Fallback values */
.element {
    background-color: var(--primary-color, #007bff);
    font-size: var(--font-size, 16px);
}
```

### **CSS Functions**
```css
.element {
    /* Calc function */
    width: calc(100% - 20px);
    height: calc(100vh - 100px);
    margin: calc(2rem + 10px);
    
    /* Min and Max functions */
    width: min(300px, 50%);
    height: max(200px, 50vh);
    
    /* Clamp function */
    font-size: clamp(1rem, 2.5vw, 2rem);
    padding: clamp(1rem, 5vw, 3rem);
    
    /* Custom properties with calc */
    --dynamic-width: calc(var(--base-width) * 2);
}
```

### **CSS Filters**
```css
.image {
    /* Blur */
    filter: blur(5px);
    
    /* Brightness */
    filter: brightness(150%);
    
    /* Contrast */
    filter: contrast(200%);
    
    /* Grayscale */
    filter: grayscale(100%);
    
    /* Hue rotate */
    filter: hue-rotate(90deg);
    
    /* Invert */
    filter: invert(100%);
    
    /* Opacity */
    filter: opacity(50%);
    
    /* Saturate */
    filter: saturate(200%);
    
    /* Sepia */
    filter: sepia(100%);
    
    /* Multiple filters */
    filter: blur(2px) brightness(120%) contrast(150%);
}
```

### **CSS Masks and Clipping**
```css
.element {
    /* Clip path */
    clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
    clip-path: circle(50% at 50% 50%);
    clip-path: inset(10% 20% 30% 40%);
    
    /* Mask */
    mask-image: url('mask.png');
    mask-size: cover;
    mask-position: center;
    mask-repeat: no-repeat;
    
    /* Mask with gradient */
    mask-image: linear-gradient(to bottom, transparent, black);
}
```

---

## 🎯 **CSS Best Practices**

### **Organization and Structure**
```css
/* CSS Reset/Normalize */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Base styles */
html {
    font-size: 16px;
    line-height: 1.5;
}

body {
    font-family: var(--font-family);
    color: var(--text-color);
    background-color: var(--bg-color);
}

/* Typography */
h1, h2, h3, h4, h5, h6 {
    margin-bottom: 1rem;
    font-weight: 600;
    line-height: 1.2;
}

p {
    margin-bottom: 1rem;
}

/* Layout components */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

/* Utility classes */
.text-center { text-align: center; }
.text-left { text-align: left; }
.text-right { text-align: right; }

.mt-1 { margin-top: 0.25rem; }
.mt-2 { margin-top: 0.5rem; }
.mt-3 { margin-top: 1rem; }
.mt-4 { margin-top: 1.5rem; }
.mt-5 { margin-top: 3rem; }

/* Component styles */
.button {
    display: inline-block;
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 0.25rem;
    background-color: var(--primary-color);
    color: white;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: var(--primary-dark);
}

/* Media queries at the end */
@media (max-width: 768px) {
    .container {
        padding: 0 0.5rem;
    }
}
```

### **Performance Optimization**
```css
/* Use efficient selectors */
/* Good */
.button { }
.nav-item { }

/* Bad */
div.container > ul > li > a { }

/* Minimize reflows */
.element {
    /* Batch layout changes */
    transform: translateX(100px) scale(1.2);
    /* Instead of separate translate and scale */
}

/* Use will-change for animations */
.animated {
    will-change: transform, opacity;
}

/* Optimize paint operations */
.element {
    /* Use transform instead of top/left for animations */
    transform: translateX(100px);
    /* Instead of left: 100px; */
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

### **Project 2: Animated Navigation**
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Navigation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
        }

        .nav {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
        }

        .nav-link:hover::before {
            left: 0;
        }

        .nav-link:hover {
            transform: translateY(-2px);
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .cta-button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .hero-content h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="nav">
        <div class="nav-container">
            <a href="#" class="logo">Brand</a>
            <ul class="nav-menu">
                <li><a href="#" class="nav-link">Home</a></li>
                <li><a href="#" class="nav-link">About</a></li>
                <li><a href="#" class="nav-link">Services</a></li>
                <li><a href="#" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Our Site</h1>
            <p>Discover amazing possibilities with modern web design</p>
            <a href="#" class="cta-button">Get Started</a>
        </div>
    </section>
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
- CSS variables for theming
- Smooth transitions

### **Exercise 3: Animated Elements**
Create animations for:
- Loading spinner
- Button hover effects
- Page transitions
- Scroll-triggered animations

### **Exercise 4: Responsive Design**
Build a responsive website that:
- Works on mobile, tablet, and desktop
- Uses mobile-first approach
- Implements responsive typography
- Optimizes images for different screen sizes

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