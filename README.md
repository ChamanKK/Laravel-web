# CHT2520 Assignment 1 U2390634 Chaman Karim Kousar

# Plants Management Application 

This application's goal is to help user keep track of their plants that they are growing in their home garden. It stores information about each plant, such as it name, type, the date it was planted and how often it needs watering. The user can manage and take care of their plants with ease with this application where all the details are in organised manner. 

This system allows user to:
- View a list of all plants they are currently growing
- Add new plants to the garden with details 
- Click on a plant to view its full information
- Edit an existing plant’s details 
- Delete a plant 

## MVC Design Pattern
### 1. Model – Represents the Data
In this project, the *plants* model represents plants stored in the database. 

**Example: App/Models/Plant.php**

```
class Plant extends Model
{
    protected $fillable = [
        'name',
        'date_planted',
        'type',
        'watering_frequency',
    ];
}
```
The *$fillable* property in model lists allows fields that can be safely mass-assigned. Mass-assignment is a process of assigning mutlitple atrributes to a model at once *name, type, date_planted,* and *watering_frequency*, through *create()* and *update()* methods. It prevents the application from malicious inputs and keeps database secure. 

### 2. View – Displays the Information to the User

The View handles what the user sees in the browser.
In this case, views display lists of plants, plant details, and forms.

**Example: resources/views/plants/index.blade.php**
```

<x-layout title="List the Plants">
    <h1>Plants in my Garden</h1>
    
    @foreach ($plants as $plant)
    <div class="plant-card">
        <h3>
            <a href="/plants/{{ $plant->id }}">
                <h2>{{ $plant->name }}</h2>
            </a>
        </h3>
        <p>Type: {{ $plant->type }}</p>
    </div>
    @endforeach

</x-layout>

```
The view receives a list of plants from the controller and loops through each plant and displays it. They don't contain any database or business logic, only present information, keeping the code clean and easy to maintain.

### 3. Controller – Handles Application Logic

The Controller receives requests, interacts with the Model, and sends data to the View.

**Example: App/Http/Controllers/PlantController.php**
```
class PlantController extends Controller
{
    function index()
    {
        $plants = Plant::all();
        return view('plants.index', ['plants' => $plants]);
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'type' => 'required|min:3|max:50',
            'date_planted' => 'required|date',
            'watering_frequency' => 'required|min:3|max:50',
        ]);

        $plant = new Plant();
        $plant->name = $request->name;
        $plant->type = $request->type;
        $plant->date_planted = $request->date_planted;
        $plant->watering_frequency = $request->watering_frequency;
        $plant->save();

        return redirect('/plants');
    }


    function show($id)
    {
        $plant = Plant::findOrFail($id);
        return view('plants.show', ['plant' => $plant]);
    }

    function destroy(Request $request)
    {
        $plant = Plant::findOrFail($request->id);
        $plant->delete();

        return redirect('/plants');
    }
}

```
- *index()* method asks the Model for all plants and sends them to the View.

- *store()* adds a new plant to the database.
- *show()* retrieves a plant by using its ID and sends it to View to show to the user

- *destroy()* deletes a plant using the ID from the request.

Every page uses `<x-layout>` for resuable layout components such as navigation menu, HTML structure, CSS link, error display, and a dynamic content slot; which keeps the code clean and reducing repeated layout markup. 