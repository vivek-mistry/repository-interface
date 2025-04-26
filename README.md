## Laravel Repository Interface

A Laravel package that leverages dependency injection to cleanly separate business logic from other application layers, promoting better code organization, testability, and adherence to SOLID principles.


![Version](https://img.shields.io/packagist/v/vivek-mistry/repository-interface.svg?style=flat-square&label=Latest%20Stable%20Version)

![Downloads](https://img.shields.io/packagist/dt/vivek-mistry/repository-interface.svg?style=flat-square&label=Total%20Downloads)

![License](https://img.shields.io/github/license/vivek-mistry/repository-interface.svg?style=flat-square)



## 🛠️ Installation

Install the package via Composer:
```bash
composer require vivek-mistry/repository-interface
```

## Particular Model Generare the Repository-Interface
```bash
php app:make-repo {ModelName}
```

So using above two files created at app/Repositories/Interface & app/Repositories/Repository
<ul>
<li>ModelNameInterface.php</li>
<li>ModelNameInterfaceRepository.php</li>
</ul>


## Create Service Prvider
```bash
php artisan make:provider RepositoryServiceProvider
```

## Register Your Service Provider & register your repository
<P>=> Register your service provider</P>
<P>=> In your RepositoryServiceProvider add below : </P>
    
```php
    public function boot(): void
    {
        $this->app->bind(
            INTERFACE_NAME::class,
            REPOSITORY_NAME::class
        );
    }
```    

## HOW TO USE IN YOUR CONTROLLER? 

For example : 

```php
class UserController extends Controller
{
    protected $userRepository;

    /**
     * Load Repository
     */
    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function index($request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        $this->userRepository->createOrUpdate($data);
    }
}
```

## Testing
```php
composer test
```

## Credits

- [Vivek Mistry](https://github.com/vivek-mistry) - Project creator and maintainer

## License
The MIT License (MIT). 
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)