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
        ],
        exercisesHeader: [
            {
                name: "name",
                label: "Name",
                align: "left",
                field: (row: { name: string; description: string }) => row.name,
            },
        ],
        programsHeader: [
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
        ],
    };

    return {
        columns,
    };
}
