# JavaScript Basics Tutorial
## Complete Guide from Beginner to Advanced

**Navigation:** [← Previous: CSS Styling & Layout](02-css-styling-layout.md) | [Next: JavaScript DOM Manipulation →](04-javascript-dom.md)

---

## 📚 Table of Contents

1. [Introduction to JavaScript](#introduction-to-javascript)
2. [JavaScript Syntax & Fundamentals](#javascript-syntax--fundamentals)
3. [Control Structures](#control-structures)
4. [Functions](#functions)
5. [Objects & Arrays](#objects--arrays)
6. [The DOM (Document Object Model)](#the-dom-document-object-model)
7. [Events](#events)
8. [Modern JavaScript (ES6+)](#modern-javascript-es6)
9. [Asynchronous JavaScript](#asynchronous-javascript)
10. [Error Handling & Debugging](#error-handling--debugging)
11. [Best Practices](#best-practices)
12. [Practice Projects](#practice-projects)
13. [Exercises & Challenges](#exercises--challenges)
14. [Related Tutorials & Next Steps](#related-tutorials--next-steps)

---

## 1. Introduction to JavaScript

### What is JavaScript?
JavaScript is a high-level, interpreted programming language that enables interactive web pages. It runs in the browser and is essential for modern web development.

- **Client-side**: Runs in the user's browser
- **Dynamic**: Can change content, styles, and structure of web pages
- **Versatile**: Used for web, server, mobile, and more

### How JavaScript Works in the Browser
- JavaScript code is executed by the browser's JavaScript engine (e.g., V8 in Chrome)
- It can manipulate the HTML and CSS of a page (the DOM)
- It responds to user actions (clicks, typing, etc.)

### Embedding JavaScript in HTML
```html
<!-- Inline script -->
<script>
  alert('Hello, world!');
</script>

<!-- External script -->
<script src="script.js"></script>
```

---

## 2. JavaScript Syntax & Fundamentals

### Variables
```js
// Old way (avoid):
var name = 'Alice';

// Modern ways:
let age = 25;      // Block-scoped, can be reassigned
const PI = 3.14;   // Block-scoped, cannot be reassigned
```

### Data Types
- **String**: `'hello'`, `"world"`
- **Number**: `42`, `3.14`
- **Boolean**: `true`, `false`
- **Null**: `null`
- **Undefined**: `undefined`
- **Object**: `{ key: 'value' }`
- **Array**: `[1, 2, 3]`

### Operators
```js
// Arithmetic
let sum = 2 + 3;
let product = 4 * 5;

// Assignment
let x = 10;
x += 5; // x = x + 5

// Comparison
x > 5;   // true
x === 15; // true (strict equality)

// Logical
true && false; // false
true || false; // true
!true;         // false
```

### Expressions & Statements
- **Expression**: Produces a value (`2 + 2`, `x > 5`)
- **Statement**: Performs an action (`let x = 5;`, `if (x > 5) {...}`)

### Comments
```js
// Single-line comment
/* Multi-line
   comment */
```

---

## 3. Control Structures

### Conditionals
```js
if (age >= 18) {
  console.log('Adult');
} else if (age >= 13) {
  console.log('Teenager');
} else {
  console.log('Child');
}

// Ternary operator
let status = (age >= 18) ? 'Adult' : 'Minor';

// Switch statement
let color = 'red';
switch (color) {
  case 'red':
    console.log('Stop!');
    break;
  case 'green':
    console.log('Go!');
    break;
  default:
    console.log('Unknown color');
}
```

### Loops
```js
// For loop
for (let i = 0; i < 5; i++) {
  console.log(i);
}

// While loop
let n = 0;
while (n < 3) {
  console.log(n);
  n++;
}

// Do...while loop
let m = 0;
do {
  console.log(m);
  m++;
} while (m < 2);
```

### Break & Continue
```js
for (let i = 0; i < 10; i++) {
  if (i === 5) break;      // Exit loop
  if (i % 2 === 0) continue; // Skip even numbers
  console.log(i);
}
```

---

## 4. Functions

### Function Declarations & Expressions
```js
// Declaration
function greet(name) {
  return 'Hello, ' + name + '!';
}

// Expression
const add = function(a, b) {
  return a + b;
};

// Arrow function (ES6+)
const multiply = (a, b) => a * b;
```

### Parameters & Return Values
```js
function square(x) {
  return x * x;
}
let result = square(4); // 16
```

### Scope & Closures
- **Scope**: Where variables are accessible (global, function, block)
- **Closure**: A function that "remembers" variables from its outer scope

```js
function makeCounter() {
  let count = 0;
  return function() {
    count++;
    return count;
  };
}
const counter = makeCounter();
counter(); // 1
counter(); // 2
```

---

## 5. Objects & Arrays

### Object Literals & Properties
```js
const person = {
  name: 'Alice',
  age: 30,
  greet: function() {
    console.log('Hi, I am ' + this.name);
  }
};
person.greet();
```

### Array Basics & Methods
```js
let fruits = ['apple', 'banana', 'cherry'];
fruits.push('date');      // Add to end
let first = fruits[0];    // Access by index
fruits.length;            // Array length
fruits.forEach(fruit => console.log(fruit));
```

### Iterating Objects & Arrays
```js
// For...in (object)
for (let key in person) {
  console.log(key, person[key]);
}

// For...of (array)
for (let fruit of fruits) {
  console.log(fruit);
}
```

---

## 6. The DOM (Document Object Model)

### What is the DOM?
- The DOM is a tree-like structure representing the HTML of a page.
- JavaScript can read and change the DOM to update the page dynamically.

### Selecting Elements
```js
// By ID
const title = document.getElementById('main-title');

// By class or tag
const items = document.getElementsByClassName('item');
const paragraphs = document.getElementsByTagName('p');

// Modern: querySelector
const firstItem = document.querySelector('.item');
const allItems = document.querySelectorAll('.item');
```

### Changing Content & Styles
```js
title.textContent = 'New Title!';
title.style.color = 'blue';
```

### Creating & Removing Elements
```js
const newDiv = document.createElement('div');
newDiv.textContent = 'Hello!';
document.body.appendChild(newDiv);

document.body.removeChild(newDiv);
```

---

## 7. Events

### Event Listeners
```js
const button = document.getElementById('myButton');
button.addEventListener('click', function() {
  alert('Button clicked!');
});
```

### Mouse & Keyboard Events
```js
button.addEventListener('mouseover', () => console.log('Mouse over!'));
document.addEventListener('keydown', event => {
  if (event.key === 'Enter') {
    console.log('Enter pressed!');
  }
});
```

### Form Events
```js
const form = document.getElementById('myForm');
form.addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent page reload
  // Validate and process form
});
```

### Event Delegation
```js
document.getElementById('list').addEventListener('click', function(event) {
  if (event.target.tagName === 'LI') {
    alert('List item clicked: ' + event.target.textContent);
  }
});
```

---

## 8. Modern JavaScript (ES6+)

### let & const
- `let` and `const` are block-scoped (not function-scoped like `var`)
- Use `const` by default, `let` if you need to reassign

### Template Literals
```js
const name = 'Alice';
console.log(`Hello, ${name}!`); // String interpolation
```

### Destructuring
```js
const user = { name: 'Bob', age: 28 };
const { name, age } = user;

const arr = [1, 2, 3];
const [a, b, c] = arr;
```

### Spread & Rest Operators
```js
const arr1 = [1, 2];
const arr2 = [...arr1, 3, 4]; // [1,2,3,4]

function sum(...numbers) {
  return numbers.reduce((a, b) => a + b, 0);
}
sum(1, 2, 3); // 6
```

### Default Parameters
```js
function greet(name = 'Guest') {
  console.log('Hello, ' + name);
}
greet(); // Hello, Guest
```

### Modules (import/export)
```js
// In module.js
export const PI = 3.14;
export function add(a, b) { return a + b; }

// In main.js
import { PI, add } from './module.js';
```

### Classes
```js
class Animal {
  constructor(name) {
    this.name = name;
  }
  speak() {
    console.log(`${this.name} makes a noise.`);
  }
}

class Dog extends Animal {
  speak() {
    console.log(`${this.name} barks.`);
  }
}

const dog = new Dog('Rex');
dog.speak(); // Rex barks.
```

---

## 9. Asynchronous JavaScript

### Callbacks
```js
function fetchData(callback) {
  setTimeout(() => {
    callback('Data loaded!');
  }, 1000);
}
fetchData(data => console.log(data));
```

### Promises
```js
function fetchData() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve('Data loaded!');
    }, 1000);
  });
}
fetchData().then(data => console.log(data));
```

### async/await
```js
async function loadData() {
  const data = await fetchData();
  console.log(data);
}
loadData();
```

### Fetch API & AJAX
```js
fetch('https://jsonplaceholder.typicode.com/posts/1')
  .then(response => response.json())
  .then(data => console.log(data));

// With async/await
async function getPost() {
  const response = await fetch('https://jsonplaceholder.typicode.com/posts/1');
  const data = await response.json();
  console.log(data);
}
getPost();
```

---

## 10. Error Handling & Debugging

### try...catch
```js
try {
  throw new Error('Something went wrong!');
} catch (error) {
  console.error(error.message);
}
```

### Console Methods
```js
console.log('Info');
console.warn('Warning!');
console.error('Error!');
console.table([{a:1, b:2}, {a:3, b:4}]);
```

### Common Errors
- ReferenceError: Using a variable that doesn't exist
- TypeError: Using a value in an invalid way (e.g., calling a non-function)
- SyntaxError: Mistyped code

### Debugging Tools
- Browser DevTools (F12)
- Breakpoints, Watch, Call Stack
- Step through code, inspect variables

---

## 11. Best Practices

- Use `const` and `let` instead of `var`
- Keep functions small and focused
- Use meaningful variable and function names
- Comment complex code
- Avoid global variables
- Use strict equality (`===`)
- Handle errors gracefully
- Keep code DRY (Don't Repeat Yourself)

---

## 12. Practice Projects

### Project 1: Interactive To-Do List
- Add, remove, and mark tasks as complete
- Store tasks in localStorage
- Use DOM manipulation and events

### Project 2: Simple Calculator
- Basic arithmetic operations
- Update display dynamically
- Handle keyboard input

### Project 3: Image Gallery with Modal
- Display thumbnails
- Click to view larger image in modal
- Next/previous navigation

### Project 4: Form Validation
- Validate user input (email, password, etc.)
- Show error messages
- Prevent form submission if invalid

### Project 5: Fetching Data from an API
- Use Fetch API to get data
- Display data in the DOM
- Handle loading and error states

---

## 13. Exercises & Challenges

### Beginner
- Write a function to reverse a string
- Print numbers 1 to 100 using a loop
- Create an array of your favorite foods and print each one

### Intermediate
- Write a function to check if a number is prime
- Create an object representing a book (title, author, pages)
- Add a click event to a button that changes the background color

### Advanced
- Build a stopwatch (start, stop, reset)
- Fetch and display a list of users from an API
- Create a simple quiz app with score tracking

---

## 14. Related Tutorials & Next Steps

- [JavaScript DOM Manipulation](04-javascript-dom.md)
- [JavaScript Events & Forms](05-javascript-events-forms.md)
- [Modern JavaScript (ES6+)](06-modern-javascript.md)
- [PHP Integration](../hostinger-php-mysql-tutorial.md)
- [HTML Fundamentals](01-html-fundamentals.md)
- [CSS Styling & Layout](02-css-styling-layout.md)

---

**Next: [JavaScript DOM Manipulation →](04-javascript-dom.md)**

---

*Master JavaScript fundamentals and you'll unlock the power to build interactive, dynamic web applications!* 