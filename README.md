## Laravel Repository Interface

It is package used to generate for the model. So, basically it will create with the ic functioncality of model and it's used to seperate the business logic from the controller. So developers can used it for as a depedency-inejction operation.

## 🛠️ Installation

Install the package via Composer:
```bash
composer require vivek-mistry/repository-interface
```

## Particular Model Generare the Repository-Interface
```bash
php app:make-repo {ModelName}
```

## Create Service Prvider
```bash
php artisan make:provider RepositoryServiceProvider
```

## Register Your Service Provider & register your repository
<P>=> Register your service provider</P>
<P>=> In your RepositoryServiceProvider add below : </P>
    
```bash
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

```bash
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