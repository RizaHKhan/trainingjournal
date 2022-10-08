export default function useTable() {
    const columns = {
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
