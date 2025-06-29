# CSS Flexbox Deep Dive Tutorial
## Master Modern Layout Techniques

**Navigation:** [← Previous: CSS Styling & Layout](02-css-styling-layout.md) | [Next: CSS Grid Mastery →](05-css-grid-mastery.md)

---

## 📚 Table of Contents

1. [Understanding Flexbox Fundamentals](#understanding-flexbox-fundamentals)
2. [Flex Container Properties](#flex-container-properties)
3. [Flex Item Properties](#flex-item-properties)
4. [Advanced Flexbox Techniques](#advanced-flexbox-techniques)
5. [Real-World Layout Examples](#real-world-layout-examples)
6. [Responsive Flexbox Patterns](#responsive-flexbox-patterns)
7. [Flexbox Best Practices](#flexbox-best-practices)
8. [Common Flexbox Challenges](#common-flexbox-challenges)
9. [Browser Support & Fallbacks](#browser-support--fallbacks)
10. [Practice Projects](#practice-projects)
11. [Exercises & Challenges](#exercises--challenges)

---

## 1. Understanding Flexbox Fundamentals

### What is Flexbox?
Flexbox (Flexible Box Layout) is a CSS layout model designed for creating responsive and flexible layouts. It provides a more efficient way to distribute space and align items in a container.

### Key Concepts
- **Flex Container**: The parent element with `display: flex`
- **Flex Items**: The children of the flex container
- **Main Axis**: The primary direction of flex layout (row or column)
- **Cross Axis**: The perpendicular direction to the main axis

### Basic Flexbox Setup
```css
.flex-container {
    display: flex; /* or inline-flex */
    /* Container properties go here */
}

.flex-item {
    /* Item properties go here */
}
```

---

## 2. Flex Container Properties

### display
```css
.flex-container {
    display: flex;        /* Block-level flex container */
    display: inline-flex; /* Inline-level flex container */
}
```

### flex-direction
```css
.flex-container {
    flex-direction: row;             /* Default: left to right */
    flex-direction: row-reverse;     /* Right to left */
    flex-direction: column;          /* Top to bottom */
    flex-direction: column-reverse;  /* Bottom to top */
}
```

### flex-wrap
```css
.flex-container {
    flex-wrap: nowrap;    /* Default: single line */
    flex-wrap: wrap;      /* Multiple lines */
    flex-wrap: wrap-reverse; /* Multiple lines, reverse */
}
```

### justify-content (Main Axis Alignment)
```css
.flex-container {
    justify-content: flex-start;     /* Default: start of main axis */
    justify-content: flex-end;       /* End of main axis */
    justify-content: center;         /* Center of main axis */
    justify-content: space-between;  /* Space between items */
    justify-content: space-around;   /* Space around items */
    justify-content: space-evenly;   /* Equal space around items */
}
```

### align-items (Cross Axis Alignment)
```css
.flex-container {
    align-items: stretch;      /* Default: stretch to fill container */
    align-items: flex-start;   /* Start of cross axis */
    align-items: flex-end;     /* End of cross axis */
    align-items: center;       /* Center of cross axis */
    align-items: baseline;     /* Align baselines */
}
```

### align-content (Multi-line Alignment)
```css
.flex-container {
    align-content: stretch;      /* Default: stretch lines */
    align-content: flex-start;   /* Start of cross axis */
    align-content: flex-end;     /* End of cross axis */
    align-content: center;       /* Center of cross axis */
    align-content: space-between; /* Space between lines */
    align-content: space-around;  /* Space around lines */
}
```

### gap (Spacing Between Items)
```css
.flex-container {
    gap: 10px;              /* Equal gap on both axes */
    gap: 10px 20px;         /* Row gap, column gap */
    row-gap: 10px;          /* Gap between rows */
    column-gap: 20px;       /* Gap between columns */
}
```

---

## 3. Flex Item Properties

### flex-grow
```css
.flex-item {
    flex-grow: 0;    /* Default: don't grow */
    flex-grow: 1;    /* Grow to fill available space */
    flex-grow: 2;    /* Grow twice as much as flex-grow: 1 */
}
```

### flex-shrink
```css
.flex-item {
    flex-shrink: 1;  /* Default: shrink if needed */
    flex-shrink: 0;  /* Don't shrink */
    flex-shrink: 2;  /* Shrink twice as much as flex-shrink: 1 */
}
```

### flex-basis
```css
.flex-item {
    flex-basis: auto;    /* Default: use content size */
    flex-basis: 0;       /* Start from zero */
    flex-basis: 200px;   /* Start from 200px */
    flex-basis: 50%;     /* Start from 50% of container */
}
```

### flex (Shorthand)
```css
.flex-item {
    flex: 0 1 auto;      /* Default: flex-grow flex-shrink flex-basis */
    flex: 1;             /* flex: 1 1 0% */
    flex: 1 1 auto;      /* Grow and shrink, auto basis */
    flex: 0 0 200px;     /* Fixed size, no grow/shrink */
    flex: 2 1 0%;        /* Grow twice as much, shrink, zero basis */
}
```

### align-self
```css
.flex-item {
    align-self: auto;        /* Default: use parent's align-items */
    align-self: flex-start;  /* Override parent alignment */
    align-self: flex-end;    /* Override parent alignment */
    align-self: center;      /* Override parent alignment */
    align-self: stretch;     /* Override parent alignment */
    align-self: baseline;    /* Override parent alignment */
}
```

### order
```css
.flex-item {
    order: 0;    /* Default: natural order */
    order: 1;    /* Move after items with order: 0 */
    order: -1;   /* Move before items with order: 0 */
}
```

---

## 4. Advanced Flexbox Techniques

### Holy Grail Layout
```css
.holy-grail {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.header {
    flex: 0 0 auto;
}

.main-content {
    display: flex;
    flex: 1;
}

.sidebar-left {
    flex: 0 0 200px;
}

.content {
    flex: 1;
}

.sidebar-right {
    flex: 0 0 200px;
}

.footer {
    flex: 0 0 auto;
}
```

### Sticky Footer
```css
.page {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.content {
    flex: 1;
}

.footer {
    flex: 0 0 auto;
}
```

### Equal Height Columns
```css
.equal-height {
    display: flex;
    gap: 20px;
}

.column {
    flex: 1;
    /* All columns will have equal height */
}
```

### Centering Content
```css
.centered {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
```

### Responsive Navigation
```css
.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.nav-links {
    display: flex;
    gap: 20px;
}

@media (max-width: 768px) {
    .nav {
        flex-direction: column;
        gap: 10px;
    }
    
    .nav-links {
        flex-direction: column;
        width: 100%;
    }
}
```

---

## 5. Real-World Layout Examples

### Card Layout
```css
.card-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    flex: 1 1 300px;
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.card-content {
    flex: 1;
    padding: 20px;
}

.card-footer {
    padding: 15px 20px;
    background: #f5f5f5;
    border-top: 1px solid #ddd;
}
```

### Pricing Table
```css
.pricing-table {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.pricing-card {
    flex: 1 1 250px;
    max-width: 300px;
    display: flex;
    flex-direction: column;
    border: 2px solid #ddd;
    border-radius: 8px;
    padding: 20px;
}

.pricing-card.featured {
    border-color: #007bff;
    transform: scale(1.05);
}

.pricing-features {
    flex: 1;
    margin: 20px 0;
}

.pricing-button {
    margin-top: auto;
}
```

### Image Gallery
```css
.gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.gallery-item {
    flex: 1 1 200px;
    max-width: 300px;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
}

.gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
```

---

## 6. Responsive Flexbox Patterns

### Mobile-First Approach
```css
/* Mobile (default) */
.container {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

/* Tablet */
@media (min-width: 768px) {
    .container {
        flex-direction: row;
        gap: 20px;
    }
    
    .sidebar {
        flex: 0 0 250px;
    }
    
    .main {
        flex: 1;
    }
}

/* Desktop */
@media (min-width: 1024px) {
    .container {
        gap: 30px;
    }
    
    .sidebar {
        flex: 0 0 300px;
    }
}
```

### Flexible Grid System
```css
.grid {
    display: flex;
    flex-wrap: wrap;
    margin: -10px;
}

.grid-item {
    flex: 1 1 100%;
    padding: 10px;
}

/* 2 columns on tablet */
@media (min-width: 768px) {
    .grid-item {
        flex: 1 1 50%;
    }
}

/* 3 columns on desktop */
@media (min-width: 1024px) {
    .grid-item {
        flex: 1 1 33.333%;
    }
}

/* 4 columns on large screens */
@media (min-width: 1200px) {
    .grid-item {
        flex: 1 1 25%;
    }
}
```

### Responsive Navigation with Hamburger
```css
.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-menu {
    display: flex;
    gap: 20px;
}

.hamburger {
    display: none;
}

@media (max-width: 768px) {
    .nav-menu {
        position: fixed;
        top: 60px;
        left: 0;
        right: 0;
        background: white;
        flex-direction: column;
        padding: 20px;
        transform: translateY(-100%);
        transition: transform 0.3s ease;
    }
    
    .nav-menu.active {
        transform: translateY(0);
    }
    
    .hamburger {
        display: block;
    }
}
```

---

## 7. Flexbox Best Practices

### 1. Use Semantic HTML
```html
<!-- Good -->
<nav class="navigation">
    <ul class="nav-list">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
    </ul>
</nav>

<!-- Avoid -->
<div class="nav">
    <div class="nav-item">Home</div>
    <div class="nav-item">About</div>
</div>
```

### 2. Combine with CSS Grid
```css
.layout {
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    gap: 20px;
}

.sidebar {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
```

### 3. Use Logical Properties
```css
.flex-container {
    /* Instead of margin-left/right */
    margin-inline: auto;
    
    /* Instead of padding-top/bottom */
    padding-block: 20px;
}
```

### 4. Optimize for Performance
```css
.flex-container {
    /* Use will-change for animations */
    will-change: transform;
    
    /* Use contain for isolation */
    contain: layout;
}
```

### 5. Accessibility Considerations
```css
.flex-container {
    /* Ensure proper reading order */
    flex-direction: row;
}

/* Use order sparingly and test with screen readers */
.flex-item {
    order: 1; /* Only when necessary */
}
```

---

## 8. Common Flexbox Challenges

### Challenge 1: Equal Height Cards
```css
/* Solution: Use flex-direction: column on cards */
.card {
    display: flex;
    flex-direction: column;
}

.card-content {
    flex: 1; /* This makes all cards equal height */
}
```

### Challenge 2: Sticky Footer
```css
/* Solution: Use flex: 1 on main content */
.page {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.main {
    flex: 1; /* This pushes footer to bottom */
}
```

### Challenge 3: Responsive Images
```css
/* Solution: Use object-fit */
.image-container {
    display: flex;
    align-items: center;
}

.image-container img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
```

### Challenge 4: Text Overflow
```css
/* Solution: Use min-width: 0 */
.flex-item {
    min-width: 0; /* Allows text to shrink */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
```

---

## 9. Browser Support & Fallbacks

### Browser Support
- **Modern Browsers**: Full support
- **IE 10-11**: Partial support (prefixed properties)
- **IE 9 and below**: No support

### Fallback Strategy
```css
/* Fallback for older browsers */
.container {
    display: block; /* Fallback */
    display: flex;  /* Modern browsers */
}

/* Use @supports for progressive enhancement */
@supports (display: flex) {
    .container {
        display: flex;
        justify-content: center;
    }
}

/* Alternative layout for non-flexbox browsers */
@supports not (display: flex) {
    .container {
        text-align: center;
    }
    
    .item {
        display: inline-block;
        vertical-align: top;
    }
}
```

### Autoprefixer
Use tools like Autoprefixer to automatically add vendor prefixes:
```css
.flex-container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
```

---

## 10. Practice Projects

### Project 1: Responsive Dashboard
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flexbox Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .dashboard {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background: #333;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-content {
            display: flex;
            flex: 1;
        }

        .sidebar {
            background: #444;
            color: white;
            padding: 1rem;
            flex: 0 0 250px;
        }

        .content {
            flex: 1;
            padding: 2rem;
        }

        .widget-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .widget {
            flex: 1 1 300px;
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .footer {
            background: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            
            .sidebar {
                flex: none;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <header class="header">
            <h1>Dashboard</h1>
            <nav>
                <a href="#" style="color: white; margin-left: 1rem;">Profile</a>
                <a href="#" style="color: white; margin-left: 1rem;">Settings</a>
            </nav>
        </header>
        
        <main class="main-content">
            <aside class="sidebar">
                <h3>Navigation</h3>
                <ul style="list-style: none; margin-top: 1rem;">
                    <li style="margin-bottom: 0.5rem;"><a href="#" style="color: white;">Dashboard</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="#" style="color: white;">Analytics</a></li>
                    <li style="margin-bottom: 0.5rem;"><a href="#" style="color: white;">Reports</a></li>
                </ul>
            </aside>
            
            <section class="content">
                <h2>Welcome to your Dashboard</h2>
                <div class="widget-grid">
                    <div class="widget">
                        <h3>Sales</h3>
                        <p>$12,345</p>
                    </div>
                    <div class="widget">
                        <h3>Users</h3>
                        <p>1,234</p>
                    </div>
                    <div class="widget">
                        <h3>Orders</h3>
                        <p>567</p>
                    </div>
                </div>
            </section>
        </main>
        
        <footer class="footer">
            <p>&copy; 2024 Dashboard. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
```

### Project 2: Pricing Cards
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Cards</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 2rem;
        }

        .pricing-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .pricing-card {
            flex: 1 1 300px;
            max-width: 350px;
            background: white;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }

        .pricing-card.featured {
            border: 2px solid #007bff;
            transform: scale(1.05);
        }

        .price {
            font-size: 3rem;
            font-weight: bold;
            color: #007bff;
            margin: 1rem 0;
        }

        .features {
            flex: 1;
            margin: 2rem 0;
        }

        .features ul {
            list-style: none;
            text-align: left;
        }

        .features li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
        }

        .features li:before {
            content: "✓";
            color: #28a745;
            margin-right: 0.5rem;
        }

        .btn {
            background: #007bff;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #0056b3;
        }

        .featured .btn {
            background: #28a745;
        }

        .featured .btn:hover {
            background: #1e7e34;
        }

        @media (max-width: 768px) {
            .pricing-card.featured {
                transform: none;
            }
        }
    </style>
</head>
<body>
    <div class="pricing-container">
        <div class="pricing-card">
            <h2>Basic</h2>
            <div class="price">$9<span style="font-size: 1rem;">/month</span></div>
            <div class="features">
                <ul>
                    <li>1 User</li>
                    <li>10 Projects</li>
                    <li>Basic Support</li>
                    <li>1GB Storage</li>
                </ul>
            </div>
            <button class="btn">Choose Plan</button>
        </div>
        
        <div class="pricing-card featured">
            <h2>Pro</h2>
            <div class="price">$19<span style="font-size: 1rem;">/month</span></div>
            <div class="features">
                <ul>
                    <li>5 Users</li>
                    <li>Unlimited Projects</li>
                    <li>Priority Support</li>
                    <li>10GB Storage</li>
                    <li>Advanced Analytics</li>
                </ul>
            </div>
            <button class="btn">Choose Plan</button>
        </div>
        
        <div class="pricing-card">
            <h2>Enterprise</h2>
            <div class="price">$49<span style="font-size: 1rem;">/month</span></div>
            <div class="features">
                <ul>
                    <li>Unlimited Users</li>
                    <li>Unlimited Projects</li>
                    <li>24/7 Support</li>
                    <li>100GB Storage</li>
                    <li>Custom Integrations</li>
                    <li>API Access</li>
                </ul>
            </div>
            <button class="btn">Choose Plan</button>
        </div>
    </div>
</body>
</html>
```

---

## 11. Exercises & Challenges

### Beginner Exercises
1. Create a simple navigation bar using flexbox
2. Build a card layout with equal height cards
3. Create a centered hero section

### Intermediate Exercises
1. Build a responsive dashboard layout
2. Create a pricing table with featured plan
3. Design a flexible image gallery

### Advanced Exercises
1. Create a complex e-commerce layout
2. Build a responsive admin panel
3. Design a magazine-style layout

### Challenge Projects
1. **Responsive Portfolio**: Create a portfolio site that adapts to all screen sizes
2. **E-commerce Product Grid**: Build a product listing with filters
3. **Social Media Feed**: Create a responsive social media interface

---

## Related Tutorials & Next Steps

- [CSS Grid Mastery](05-css-grid-mastery.md) - Master CSS Grid layouts
- [CSS Styling & Layout](02-css-styling-layout.md) - Back to CSS basics
- [JavaScript Basics](03-javascript-basics.md) - Add interactivity
- [HTML Fundamentals](01-html-fundamentals.md) - Structure your content

---

**Next: [CSS Grid Mastery →](05-css-grid-mastery.md)**

---

*Master CSS Flexbox and you'll have the power to create any layout you can imagine!* 