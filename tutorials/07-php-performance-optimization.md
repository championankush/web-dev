# PHP Performance Optimization

## 1. Database Optimization

### Prepared Statements
```php
// Bad: SQL Injection vulnerable and slower
$query = "SELECT * FROM users WHERE id = " . $_GET['id'];

// Good: Prepared statements
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_GET['id']]);
```

### Indexing Strategy
```sql
-- Add indexes for frequently queried columns
CREATE INDEX idx_user_email ON users(email);
CREATE INDEX idx_user_status ON users(status);
```

### Connection Pooling
```php
// Use persistent connections
$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_PERSISTENT => true
]);
```

---

## 2. Caching Strategies

### OpCache Configuration
```ini
; php.ini
opcache.enable=1
opcache.memory_consumption=128
opcache.max_accelerated_files=4000
opcache.revalidate_freq=2
```

### Application-Level Caching
```php
// Simple file-based caching
function getCachedData($key, $callback, $ttl = 3600) {
    $cacheFile = "cache/" . md5($key) . ".cache";
    
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $ttl) {
        return unserialize(file_get_contents($cacheFile));
    }
    
    $data = $callback();
    file_put_contents($cacheFile, serialize($data));
    return $data;
}

// Usage
$users = getCachedData('all_users', function() {
    return $pdo->query("SELECT * FROM users")->fetchAll();
}, 1800); // 30 minutes
```

### Redis Caching
```php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// Cache with expiration
$redis->setex('user:123', 3600, json_encode($userData));

// Check cache first
$cached = $redis->get('user:123');
if ($cached) {
    return json_decode($cached, true);
}
```

---

## 3. Code Optimization

### Avoid Expensive Operations in Loops
```php
// Bad: strlen() called in every iteration
for ($i = 0; $i < strlen($string); $i++) {
    // ...
}

// Good: Calculate once
$length = strlen($string);
for ($i = 0; $i < $length; $i++) {
    // ...
}
```

### Use References for Large Arrays
```php
// Bad: Creates copies
foreach ($largeArray as $item) {
    $item['processed'] = true;
}

// Good: Uses references
foreach ($largeArray as &$item) {
    $item['processed'] = true;
}
unset($item); // Important: unset reference
```

### String Concatenation
```php
// Bad: Multiple concatenations
$result = '';
for ($i = 0; $i < 1000; $i++) {
    $result .= $i . ',';
}

// Good: Use implode()
$numbers = range(0, 999);
$result = implode(',', $numbers);
```

---

## 4. Memory Management

### Unset Large Variables
```php
$largeData = file_get_contents('large_file.txt');
processData($largeData);
unset($largeData); // Free memory immediately
```

### Use Generators for Large Datasets
```php
function readLargeFile($filename) {
    $handle = fopen($filename, 'r');
    while (!feof($handle)) {
        yield fgets($handle);
    }
    fclose($handle);
}

// Usage
foreach (readLargeFile('large_file.txt') as $line) {
    processLine($line);
}
```

---

## 5. Profiling and Monitoring

### Xdebug Profiling
```ini
; php.ini
xdebug.profiler_enable=1
xdebug.profiler_output_dir=/tmp/profiler
xdebug.profiler_output_name=cachegrind.out.%p
```

### Simple Performance Measurement
```php
function measureTime($callback, $iterations = 1) {
    $start = microtime(true);
    
    for ($i = 0; $i < $iterations; $i++) {
        $callback();
    }
    
    $end = microtime(true);
    $time = ($end - $start) / $iterations;
    
    echo "Average execution time: " . ($time * 1000) . "ms\n";
    return $time;
}

// Usage
measureTime(function() {
    // Code to measure
    $result = expensiveOperation();
}, 100);
```

---

## 6. Server Configuration

### PHP-FPM Tuning
```ini
; php-fpm.conf
pm = dynamic
pm.max_children = 50
pm.start_servers = 5
pm.min_spare_servers = 5
pm.max_spare_servers = 35
pm.max_requests = 500
```

### Apache/Nginx Optimization
```apache
# Apache: Enable compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
</IfModule>

# Enable caching
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

---

**Next:** [PHP Testing and Debugging](./08-php-testing-debugging.md)

## Performance Checklist

- [ ] Enable OpCache
- [ ] Use prepared statements
- [ ] Implement caching strategy
- [ ] Optimize database queries
- [ ] Profile slow code
- [ ] Configure server properly
- [ ] Monitor memory usage
- [ ] Use CDN for static assets 