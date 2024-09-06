export function useMeiliSearch() {
    function customSearchFn(helper) {
        // If we need to do any pre-search configuration, we can do it here

        helper.search();
    }

    return {
        customSearchFn,
    };
}
