# Training Journal

## Development Environment

### Valet

If you are on MacOS then use Valet to spin up a Nginx server.
To compile the frontend assets:

```
npm run dev
```

### Refresh database

```
php artisan migrate:fresh --seed

```

## Database

### Models

| Name     | Description                 |
| -------- | --------------------------- |
| User     | asdf                        |
| Program  | Users programs              |
| Exercise | Generic Exercises           |
| Workout  | Uses can set their workouts |

#### Exercises

Do not allow users add their own exercises. They can request to add exercises that don't already exist in the app.

## Roles

#### Admin

-   Can add exercises

#### Trainer

-   Can create programs for Trainees
-   Can see Trainee programs (if given permission by Trainee)
-   Can edit Trainee programs (if given permission by Trainee)
-   Can add workouts of their own

#### Trainee

-   Able to create programs
-   Able to add workouts
