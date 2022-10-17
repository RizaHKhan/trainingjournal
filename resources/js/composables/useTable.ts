export default function useTable() {
    const columns = {
        workoutHeader: [
            {
                name: "name",
                label: "Name",
                align: "left",
                field: (row: { name: string }) => row.name,
            },
            {
                name: "weight",
                label: "Weight",
                align: "left",
                field: (row: { weight: number }) => row.weight,
            },
            {
                name: "rpe",
                label: "RPE",
                align: "left",
                field: (row: { rpe: number }) => row.rpe,
            },
            {
                name: "comment",
                label: "Comment",
                align: "left",
                field: (row: { comment: string }) => row.comment,
            },
        ],
        exercisesHeader: [
            {
                name: "name",
                label: "Name",
                align: "left",
                field: (row: { name: string; description: string }) => row.name,
            },
            {
                name: "sets",
                label: "Sets",
                align: "left",
                field: (row: {
                    name: string;
                    description: string;
                    sets: number;
                }) => row,
            },
            {
                name: "actions",
                label: "Actions",
                align: "left",
            },
        ],
        programHeaders: [
            {
                name: "name",
                label: "Name",
                align: "left",
                field: (row: { name: string; description: string }) => row.name,
            },
            {
                name: "description",
                label: "Description",
                field: (row: { name: string; description: string }) =>
                    row.description,
                align: "left",
            },
            {
                name: "exercises",
                label: "Exercises",
                align: "left",
            },
            {
                name: "actions",
                label: "Actions",
                align: "left",
            },
        ],
    };

    return {
        columns,
    };
}
