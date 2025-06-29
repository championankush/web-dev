# PHP Testing and Debugging

## 1. Unit Testing with PHPUnit

### Installation
```bash
composer require --dev phpunit/phpunit
```

### Basic Test Structure
```php
<?php
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAddition()
    {
        $calculator = new Calculator();
        $result = $calculator->add(2, 3);
        $this->assertEquals(5, $result);
    }
    
    public function testDivisionByZero()
    {
        $calculator = new Calculator();
        $this->expectException(DivisionByZeroError::class);
        $calculator->divide(10, 0);
    }
}
```

### Test Fixtures
```php
class UserTest extends TestCase
{
    private $pdo;
    
    protected function setUp(): void
    {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->exec('CREATE TABLE users (id INTEGER, name TEXT)');
    }
    
    protected function tearDown(): void
    {
        $this->pdo = null;
    }
    
    public function testCreateUser()
    {
        $userService = new UserService($this->pdo);
        $user = $userService->createUser('John Doe');
        
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->getName());
    }
}
```

---

## 2. Mocking and Stubbing

### Mock Objects
```php
class EmailServiceTest extends TestCase
{
    public function testSendWelcomeEmail()
    {
        // Create mock
        $mailer = $this->createMock(MailerInterface::class);
        
        // Set expectations
        $mailer->expects($this->once())
               ->method('send')
               ->with('user@example.com', 'Welcome!', 'Welcome to our site')
               ->willReturn(true);
        
        $emailService = new EmailService($mailer);
        $result = $emailService->sendWelcomeEmail('user@example.com');
        
        $this->assertTrue($result);
    }
}
```

### Partial Mocks
```php
class UserServiceTest extends TestCase
{
    public function testGetUserWithCache()
    {
        $userService = $this->getMockBuilder(UserService::class)
                           ->onlyMethods(['fetchFromDatabase'])
                           ->getMock();
        
        $userService->expects($this->once())
                   ->method('fetchFromDatabase')
                   ->with(123)
                   ->willReturn(new User(123, 'John'));
        
        $user = $userService->getUser(123);
        $this->assertEquals('John', $user->getName());
    }
}
```

---

## 3. Debugging Techniques

### Error Reporting
```php
// Development environment
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error.log');

// Production environment
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
```

### Custom Error Handler
```php
function customErrorHandler($errno, $errstr, $errfile, $errline)
{
    $error = [
        'type' => $errno,
        'message' => $errstr,
        'file' => $errfile,
        'line' => $errline,
        'time' => date('Y-m-d H:i:s')
    ];
    
    error_log(json_encode($error) . "\n", 3, '/path/to/custom_errors.log');
    
    return true; // Don't execute PHP's internal error handler
}

set_error_handler('customErrorHandler');
```

### Debugging with var_dump and print_r
```php
// Basic debugging
var_dump($variable);
print_r($variable);

// Pretty print for arrays
echo '<pre>';
print_r($array);
echo '</pre>';

// Debug with exit
var_dump($variable);
exit('Debug point reached');
```

---

## 4. Advanced Debugging

### Xdebug Configuration
```ini
; php.ini
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.client_port=9003
xdebug.client_host=127.0.0.1
xdebug.idekey=VSCODE
```

### Debugging with Xdebug
```php
// Set breakpoints in your IDE
function complexCalculation($data)
{
    $result = 0;
    
    foreach ($data as $item) {
        // Set breakpoint here
        $result += $item * 2;
    }
    
    return $result;
}
```

### Logging with Monolog
```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('app');
$log->pushHandler(new StreamHandler('logs/app.log', Logger::DEBUG));

$log->info('User logged in', ['user_id' => 123]);
$log->error('Database connection failed', ['error' => $e->getMessage()]);
```

---

## 5. Testing Best Practices

### Test Naming Conventions
```php
class UserServiceTest extends TestCase
{
    // MethodName_Scenario_ExpectedResult
    public function testCreateUser_WithValidData_ReturnsUserObject()
    {
        // Test implementation
    }
    
    public function testCreateUser_WithInvalidEmail_ThrowsException()
    {
        // Test implementation
    }
}
```

### Data Providers
```php
class MathTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAddition($a, $b, $expected)
    {
        $calculator = new Calculator();
        $this->assertEquals($expected, $calculator->add($a, $b));
    }
    
    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [1, 1, 2],
            [2, 3, 5],
            [-1, 1, 0],
        ];
    }
}
```

### Testing Private Methods
```php
class UserServiceTest extends TestCase
{
    public function testPrivateMethod()
    {
        $userService = new UserService();
        
        $reflection = new ReflectionClass($userService);
        $method = $reflection->getMethod('validateEmail');
        $method->setAccessible(true);
        
        $result = $method->invoke($userService, 'test@example.com');
        $this->assertTrue($result);
    }
}
```

---

## 6. Integration Testing

### Database Testing
```php
class UserRepositoryTest extends TestCase
{
    private $pdo;
    
    protected function setUp(): void
    {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->exec('
            CREATE TABLE users (
                id INTEGER PRIMARY KEY,
                name TEXT,
                email TEXT UNIQUE
            )
        ');
    }
    
    public function testSaveUser()
    {
        $repository = new UserRepository($this->pdo);
        $user = new User(null, 'John Doe', 'john@example.com');
        
        $savedUser = $repository->save($user);
        
        $this->assertNotNull($savedUser->getId());
        
        $found = $repository->findById($savedUser->getId());
        $this->assertEquals('John Doe', $found->getName());
    }
}
```

---

## 7. Performance Testing

### Benchmarking
```php
class PerformanceTest extends TestCase
{
    public function testAlgorithmPerformance()
    {
        $start = microtime(true);
        
        // Code to test
        $result = expensiveAlgorithm(1000);
        
        $end = microtime(true);
        $executionTime = $end - $start;
        
        $this->assertLessThan(1.0, $executionTime, 'Algorithm took too long');
        $this->assertNotNull($result);
    }
}
```

---

## Testing Checklist

- [ ] Write unit tests for all public methods
- [ ] Use meaningful test names
- [ ] Test both success and failure scenarios
- [ ] Mock external dependencies
- [ ] Use data providers for multiple test cases
- [ ] Set up proper test fixtures
- [ ] Configure error reporting for development
- [ ] Use logging for debugging
- [ ] Set up Xdebug for step-by-step debugging
- [ ] Run tests before deployment

---

**Next:** [PHP Security Best Practices](./06-php-security-advanced.md) | [Building REST APIs with PHP](./09-php-rest-apis.md) 