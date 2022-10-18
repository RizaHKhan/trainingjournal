import { computed } from "vue"
import { useQuasar } from "quasar"

export default function useResponsiveness() {
    const $q = useQuasar()

    const breakpoint = computed(() => $q.screen.name)
    const denseTable = computed(() => $q.screen.lt.md)

    const direction = computed(() => {
        let direction = ""
        switch (breakpoint.value) {
            case "xs":
                direction = "row"
                break
            case "sm":
                direction = "row"
                break
            case "md":
                direction = "column"
                break
            default:
                direction = "column"
                break
        }

        return direction
    })

    return {
        breakpoint,
        direction,
        denseTable
    }
}
