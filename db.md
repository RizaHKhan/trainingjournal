### User

| column               | value                      |
| -------------------- | -------------------------- |
| `id`                 | key                        |
| `email`              | string                     |
| `email_verified_at`  | string                     |
| `password`           | string                     |
| `remember_token`     | string                     |
| `measurement_system` | enum('metric', 'imperial') |

### Program

| column        | value  |
| ------------- | ------ |
| `id`          | key    |
| `name`        | string |
| `description` | string |

### Exercise

| column        | value  |
| ------------- | ------ |
| `id`          | key    |
| `name`        | string |
| `description` | string |

### Program/Exercise Junction Table

| column        | value |
| ------------- | ----- |
| `id`          | key   |
| `exercise_id` | key   |
| `program_id`  | key   |

### Workout

| column    | value | additional                           |
| --------- | ----- | ------------------------------------ |
| `id`      | key   |                                      |
| `data`    | jsonb | exercise_id, program_id, weight, rpe |
| `user_id` | key   |                                      |
| `date`    | date  |                                      |

### Weight

| column    | value |
| --------- | ----- |
| `id`      | key   |
| `user_id` | key   |
| `date`    | date  |
| `amount`  | float |
