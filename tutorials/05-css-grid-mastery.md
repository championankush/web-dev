# CSS Grid Mastery Tutorial
## Master Modern Layout Techniques

**Navigation:** [← Previous: CSS Flexbox Deep Dive](04-css-flexbox-deep-dive.md) | [Next: JavaScript Basics →](03-javascript-basics.md)

---

## 📚 Table of Contents

1. [Understanding CSS Grid Fundamentals](#understanding-css-grid-fundamentals)
2. [Grid Container Properties](#grid-container-properties)
3. [Grid Item Properties](#grid-item-properties)
4. [Advanced Grid Techniques](#advanced-grid-techniques)
5. [Real-World Layout Examples](#real-world-layout-examples)
6. [Responsive Grid Patterns](#responsive-grid-patterns)
7. [Grid Best Practices](#grid-best-practices)
8. [Common Grid Challenges](#common-grid-challenges)
9. [Browser Support & Fallbacks](#browser-support--fallbacks)
10. [Practice Projects](#practice-projects)
11. [Exercises & Challenges](#exercises--challenges)

---

## 1. Understanding CSS Grid Fundamentals

### What is CSS Grid?
CSS Grid is a two-dimensional layout system that allows you to create complex web layouts with rows and columns. It's perfect for creating page layouts, dashboards, and complex component arrangements.

### Key Concepts
- **Grid Container**: The parent element with `display: grid`
- **Grid Items**: The children of the grid container
- **Grid Lines**: The dividing lines that make up the grid structure
- **Grid Tracks**: The rows and columns of the grid
- **Grid Cells**: The space between four grid lines
- **Grid Areas**: Any area of the grid bound by four grid lines

### Basic Grid Setup
```css
.grid-container {
    display: grid;
    /* Grid properties go here */
}

.grid-item {
    /* Item properties go here */
}
```

---

## 2. Grid Container Properties

### display
```css
.grid-container {
    display: grid;        /* Block-level grid container */
    display: inline-grid; /* Inline-level grid container */
}
```

### grid-template-columns
```css
.grid-container {
    /* Fixed sizes */
    grid-template-columns: 200px 200px 200px;
    
    /* Fractional units */
    grid-template-columns: 1fr 2fr 1fr;
    
    /* Mixed units */
    grid-template-columns: 200px 1fr 2fr;
    
    /* Using repeat() */
    grid-template-columns: repeat(3, 1fr);
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    
    /* Named grid lines */
    grid-template-columns: [start] 1fr [middle] 2fr [end];
}
```

### grid-template-rows
```css
.grid-container {
    /* Similar to columns but for rows */
    grid-template-rows: 100px 200px 100px;
    grid-template-rows: repeat(3, 1fr);
    grid-template-rows: [header] 80px [content] 1fr [footer] 60px;
}
```

### grid-template-areas
```css
.grid-container {
    grid-template-areas: 
        "header header header"
        "sidebar content content"
        "footer footer footer";
}

.header { grid-area: header; }
.sidebar { grid-area: sidebar; }
.content { grid-area: content; }
.footer { grid-area: footer; }
```

### grid-template (Shorthand)
```css
.grid-container {
    grid-template: 
        "header header header" 80px
        "sidebar content content" 1fr
        "footer footer footer" 60px
        / 200px 1fr 1fr;
}
```

### grid-column-gap / grid-row-gap / gap
```css
.grid-container {
    grid-column-gap: 20px;  /* Gap between columns */
    grid-row-gap: 10px;     /* Gap between rows */
    gap: 10px 20px;         /* row-gap column-gap */
    gap: 20px;              /* Equal gap on both axes */
}
```

### justify-items (Inline Axis)
```css
.grid-container {
    justify-items: start;    /* Default: stretch */
    justify-items: end;
    justify-items: center;
    justify-items: stretch;
}
```

### align-items (Block Axis)
```css
.grid-container {
    align-items: start;      /* Default: stretch */
    align-items: end;
    align-items: center;
    align-items: stretch;
    align-items: baseline;
}
```

### justify-content / align-content
```css
.grid-container {
    justify-content: start;      /* Default */
    justify-content: end;
    justify-content: center;
    justify-content: stretch;
    justify-content: space-around;
    justify-content: space-between;
    justify-content: space-evenly;
    
    align-content: start;        /* Default */
    align-content: end;
    align-content: center;
    align-content: stretch;
    align-content: space-around;
    align-content: space-between;
    align-content: space-evenly;
}
```

---

## 3. Grid Item Properties

### grid-column-start / grid-column-end / grid-column
```css
.grid-item {
    grid-column-start: 1;
    grid-column-end: 3;
    
    /* Shorthand */
    grid-column: 1 / 3;
    grid-column: 1 / span 2;
    grid-column: span 2;
}
```

### grid-row-start / grid-row-end / grid-row
```css
.grid-item {
    grid-row-start: 1;
    grid-row-end: 3;
    
    /* Shorthand */
    grid-row: 1 / 3;
    grid-row: 1 / span 2;
    grid-row: span 2;
}
```

### grid-area
```css
.grid-item {
    grid-area: 1 / 1 / 3 / 3;  /* row-start / column-start / row-end / column-end */
    grid-area: header;          /* Named area */
    grid-area: 1 / 1 / span 2 / span 2;  /* With span */
}
```

### justify-self
```css
.grid-item {
    justify-self: start;    /* Override container's justify-items */
    justify-self: end;
    justify-self: center;
    justify-self: stretch;
}
```

### align-self
```css
.grid-item {
    align-self: start;      /* Override container's align-items */
    align-self: end;
    align-self: center;
    align-self: stretch;
    align-self: baseline;
}
```

---

## 4. Advanced Grid Techniques

### Auto-Fit vs Auto-Fill
```css
/* Auto-fit: Creates as many columns as can fit */
.grid-container {
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}

/* Auto-fill: Creates as many columns as possible, even empty ones */
.grid-container {
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
}
```

### Subgrid (Experimental)
```css
.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}

.grid-item {
    display: grid;
    grid-template-columns: subgrid;  /* Inherits parent's columns */
}
```

### Grid with Masonry-like Layout
```css
.masonry-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    grid-auto-rows: 0;
    grid-auto-flow: dense;
}

.tall-item {
    grid-row: span 2;
}

.wide-item {
    grid-column: span 2;
}
```

### Holy Grail Layout with Grid
```css
.holy-grail {
    display: grid;
    grid-template-areas: 
        "header header header"
        "sidebar content aside"
        "footer footer footer";
    grid-template-rows: 80px 1fr 60px;
    grid-template-columns: 200px 1fr 200px;
    min-height: 100vh;
}

.header { grid-area: header; }
.sidebar { grid-area: sidebar; }
.content { grid-area: content; }
.aside { grid-area: aside; }
.footer { grid-area: footer; }
```

---

## 5. Real-World Layout Examples

### Magazine Layout
```css
.magazine {
    display: grid;
    grid-template-areas: 
        "header header header"
        "nav nav nav"
        "main main sidebar"
        "footer footer footer";
    grid-template-columns: 1fr 1fr 300px;
    grid-template-rows: auto auto 1fr auto;
    gap: 20px;
}

.header { grid-area: header; }
.nav { grid-area: nav; }
.main { grid-area: main; }
.sidebar { grid-area: sidebar; }
.footer { grid-area: footer; }

.article-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}
```

### Dashboard Layout
```css
.dashboard {
    display: grid;
    grid-template-areas: 
        "header header header header"
        "sidebar chart1 chart2 chart3"
        "sidebar chart4 chart5 chart6"
        "footer footer footer footer";
    grid-template-columns: 250px repeat(3, 1fr);
    grid-template-rows: 60px repeat(2, 200px) 60px;
    gap: 20px;
    height: 100vh;
}

.header { grid-area: header; }
.sidebar { grid-area: sidebar; }
.chart1 { grid-area: chart1; }
.chart2 { grid-area: chart2; }
.chart3 { grid-area: chart3; }
.chart4 { grid-area: chart4; }
.chart5 { grid-area: chart5; }
.chart6 { grid-area: chart6; }
.footer { grid-area: footer; }
```

### Photo Gallery
```css
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    grid-auto-rows: 200px;
    gap: 10px;
}

.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.gallery-item.tall {
    grid-row: span 2;
}

.gallery-item.wide {
    grid-column: span 2;
}

.gallery-item.large {
    grid-column: span 2;
    grid-row: span 2;
}
```

---

## 6. Responsive Grid Patterns

### Mobile-First Responsive Grid
```css
/* Mobile (default) */
.grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

/* Tablet */
@media (min-width: 768px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Desktop */
@media (min-width: 1024px) {
    .grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Large screens */
@media (min-width: 1200px) {
    .grid {
        grid-template-columns: repeat(4, 1fr);
    }
}
```

### Responsive Layout with Grid Areas
```css
.layout {
    display: grid;
    grid-template-areas: 
        "header"
        "nav"
        "main"
        "sidebar"
        "footer";
    grid-template-rows: auto auto 1fr auto auto;
}

.header { grid-area: header; }
.nav { grid-area: nav; }
.main { grid-area: main; }
.sidebar { grid-area: sidebar; }
.footer { grid-area: footer; }

@media (min-width: 768px) {
    .layout {
        grid-template-areas: 
            "header header"
            "nav nav"
            "sidebar main"
            "footer footer";
        grid-template-columns: 250px 1fr;
        grid-template-rows: auto auto 1fr auto;
    }
}

@media (min-width: 1024px) {
    .layout {
        grid-template-areas: 
            "header header header"
            "nav sidebar main"
            "footer footer footer";
        grid-template-columns: 200px 250px 1fr;
        grid-template-rows: auto 1fr auto;
    }
}
```

### Responsive Card Grid
```css
.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    padding: 20px;
}

.card {
    background: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .card-grid {
        grid-template-columns: 1fr;
        gap: 15px;
        padding: 15px;
    }
}
```

---

## 7. Grid Best Practices

### 1. Use Semantic HTML
```html
<!-- Good -->
<main class="grid-container">
    <article class="grid-item">Content</article>
    <aside class="grid-item">Sidebar</aside>
</main>

<!-- Avoid -->
<div class="grid">
    <div class="item">Content</div>
    <div class="item">Sidebar</div>
</div>
```

### 2. Combine with Flexbox
```css
.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.grid-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
```

### 3. Use Logical Properties
```css
.grid-container {
    /* Instead of margin-left/right */
    margin-inline: auto;
    
    /* Instead of padding-top/bottom */
    padding-block: 20px;
}
```

### 4. Optimize for Performance
```css
.grid-container {
    /* Use contain for isolation */
    contain: layout;
    
    /* Use will-change for animations */
    will-change: transform;
}
```

### 5. Accessibility Considerations
```css
.grid-container {
    /* Ensure proper reading order */
    grid-template-areas: 
        "header"
        "nav"
        "main"
        "sidebar"
        "footer";
}
```

---

## 8. Common Grid Challenges

### Challenge 1: Equal Height Columns
```css
/* Solution: Grid automatically handles this */
.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

/* All items will have equal height automatically */
```

### Challenge 2: Sticky Footer
```css
/* Solution: Use grid with min-height */
.page {
    display: grid;
    grid-template-rows: auto 1fr auto;
    min-height: 100vh;
}

.header { grid-row: 1; }
.main { grid-row: 2; }
.footer { grid-row: 3; }
```

### Challenge 3: Responsive Images
```css
/* Solution: Use object-fit */
.image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 10px;
}

.image-grid img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
```

### Challenge 4: Complex Layouts
```css
/* Solution: Use named grid areas */
.complex-layout {
    display: grid;
    grid-template-areas: 
        "header header header"
        "nav main sidebar"
        "nav footer sidebar";
    grid-template-columns: 200px 1fr 250px;
    grid-template-rows: 80px 1fr 60px;
}
```

---

## 9. Browser Support & Fallbacks

### Browser Support
- **Modern Browsers**: Full support
- **IE 10-11**: No support
- **Edge 12-15**: Partial support

### Fallback Strategy
```css
/* Fallback for older browsers */
.container {
    display: block; /* Fallback */
    display: grid;  /* Modern browsers */
}

/* Use @supports for progressive enhancement */
@supports (display: grid) {
    .container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Alternative layout for non-grid browsers */
@supports not (display: grid) {
    .container {
        display: flex;
        flex-wrap: wrap;
    }
    
    .item {
        flex: 1 1 300px;
    }
}
```

---

## 10. Practice Projects

### Project 1: Portfolio Grid
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Grid</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .portfolio {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .portfolio-item {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .portfolio-item:hover {
            transform: translateY(-5px);
        }

        .portfolio-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .portfolio-content {
            padding: 20px;
        }

        .portfolio-content h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .portfolio-content p {
            color: #666;
            line-height: 1.6;
        }

        .portfolio-item.featured {
            grid-column: span 2;
            grid-row: span 2;
        }

        .portfolio-item.featured img {
            height: 300px;
        }

        @media (max-width: 768px) {
            .portfolio-item.featured {
                grid-column: span 1;
                grid-row: span 1;
            }
            
            .portfolio-item.featured img {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="portfolio">
        <div class="portfolio-item featured">
            <img src="https://via.placeholder.com/600x300" alt="Project 1">
            <div class="portfolio-content">
                <h3>Featured Project</h3>
                <p>This is a featured project that spans multiple grid cells to showcase important work.</p>
            </div>
        </div>
        
        <div class="portfolio-item">
            <img src="https://via.placeholder.com/300x200" alt="Project 2">
            <div class="portfolio-content">
                <h3>Web Design</h3>
                <p>Modern web design with clean aesthetics and user-friendly interfaces.</p>
            </div>
        </div>
        
        <div class="portfolio-item">
            <img src="https://via.placeholder.com/300x200" alt="Project 3">
            <div class="portfolio-content">
                <h3>Mobile App</h3>
                <p>Cross-platform mobile application with intuitive user experience.</p>
            </div>
        </div>
        
        <div class="portfolio-item">
            <img src="https://via.placeholder.com/300x200" alt="Project 4">
            <div class="portfolio-content">
                <h3>E-commerce</h3>
                <p>Full-featured online store with payment processing and inventory management.</p>
            </div>
        </div>
        
        <div class="portfolio-item">
            <img src="https://via.placeholder.com/300x200" alt="Project 5">
            <div class="portfolio-content">
                <h3>Dashboard</h3>
                <p>Analytics dashboard with real-time data visualization and reporting.</p>
            </div>
        </div>
        
        <div class="portfolio-item">
            <img src="https://via.placeholder.com/300x200" alt="Project 6">
            <div class="portfolio-content">
                <h3>Blog Platform</h3>
                <p>Content management system with SEO optimization and social sharing.</p>
            </div>
        </div>
    </div>
</body>
</html>
```

### Project 2: Dashboard Layout
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Grid</title>
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
            display: grid;
            grid-template-areas: 
                "header header header header"
                "sidebar chart1 chart2 chart3"
                "sidebar chart4 chart5 chart6"
                "footer footer footer footer";
            grid-template-columns: 250px repeat(3, 1fr);
            grid-template-rows: 60px repeat(2, 200px) 60px;
            gap: 20px;
            height: 100vh;
            padding: 20px;
        }

        .header {
            grid-area: header;
            background: #333;
            color: white;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar {
            grid-area: sidebar;
            background: #444;
            color: white;
            padding: 20px;
            border-radius: 8px;
        }

        .sidebar h3 {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            padding: 10px 0;
            border-bottom: 1px solid #555;
        }

        .chart1 { grid-area: chart1; }
        .chart2 { grid-area: chart2; }
        .chart3 { grid-area: chart3; }
        .chart4 { grid-area: chart4; }
        .chart5 { grid-area: chart5; }
        .chart6 { grid-area: chart6; }

        .chart {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .chart h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .chart-content {
            height: 120px;
            background: #f0f0f0;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }

        .footer {
            grid-area: footer;
            background: #333;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .dashboard {
                grid-template-areas: 
                    "header"
                    "sidebar"
                    "chart1"
                    "chart2"
                    "chart3"
                    "chart4"
                    "chart5"
                    "chart6"
                    "footer";
                grid-template-columns: 1fr;
                grid-template-rows: auto auto repeat(6, 150px) auto;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <header class="header">
            <h1>Dashboard</h1>
            <nav>
                <a href="#" style="color: white; margin-left: 20px;">Profile</a>
                <a href="#" style="color: white; margin-left: 20px;">Settings</a>
            </nav>
        </header>
        
        <aside class="sidebar">
            <h3>Navigation</h3>
            <ul>
                <li><a href="#" style="color: white;">Dashboard</a></li>
                <li><a href="#" style="color: white;">Analytics</a></li>
                <li><a href="#" style="color: white;">Reports</a></li>
                <li><a href="#" style="color: white;">Settings</a></li>
            </ul>
        </aside>
        
        <div class="chart chart1">
            <h3>Sales Overview</h3>
            <div class="chart-content">Chart 1</div>
        </div>
        
        <div class="chart chart2">
            <h3>User Growth</h3>
            <div class="chart-content">Chart 2</div>
        </div>
        
        <div class="chart chart3">
            <h3>Revenue</h3>
            <div class="chart-content">Chart 3</div>
        </div>
        
        <div class="chart chart4">
            <h3>Traffic Sources</h3>
            <div class="chart-content">Chart 4</div>
        </div>
        
        <div class="chart chart5">
            <h3>Conversion Rate</h3>
            <div class="chart-content">Chart 5</div>
        </div>
        
        <div class="chart chart6">
            <h3>Customer Satisfaction</h3>
            <div class="chart-content">Chart 6</div>
        </div>
        
        <footer class="footer">
            <p>&copy; 2024 Dashboard. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
```

---

## 11. Exercises & Challenges

### Beginner Exercises
1. Create a simple 3-column grid layout
2. Build a responsive card grid
3. Create a basic dashboard layout

### Intermediate Exercises
1. Build a magazine-style layout with grid areas
2. Create a photo gallery with different sized items
3. Design a responsive pricing table

### Advanced Exercises
1. Create a complex e-commerce layout
2. Build a responsive admin panel with sidebar
3. Design a masonry-style layout

### Challenge Projects
1. **Responsive Portfolio**: Create a portfolio that adapts to all screen sizes
2. **E-commerce Product Grid**: Build a product listing with filters and sorting
3. **Social Media Feed**: Create a responsive social media interface

---

## Related Tutorials & Next Steps

- [CSS Flexbox Deep Dive](04-css-flexbox-deep-dive.md) - Master Flexbox layouts
- [CSS Styling & Layout](02-css-styling-layout.md) - Back to CSS basics
- [JavaScript Basics](03-javascript-basics.md) - Add interactivity
- [HTML Fundamentals](01-html-fundamentals.md) - Structure your content

---

**Next: [JavaScript Basics →](03-javascript-basics.md)**

---

*Master CSS Grid and you'll have the power to create any layout you can imagine!* 