const hierarchy = ['country', 'region', 'city', 'district']; // Extend this as needed.

$(document).ready(function() {
    loadHierarchyLevel(0);
});

function loadHierarchyLevel(index) {
    if (index >= hierarchy.length) return;

    let parentId = null;
    if (index > 0) {
        parentId = $(`#${hierarchy[index - 1]}`).val();
    }

    $.ajax({
        url: 'php/load.php',
        method: 'POST',
        data: {
            type: hierarchy[index],
            parentId: parentId
        },
        dataType: 'json',
        beforeSend: function() {
            $(`#loading-${hierarchy[index]}`).show();
        },
        success: function(data) {
            let inputField = `<input list="datalist-${hierarchy[index]}" id="${hierarchy[index]}" placeholder="Select ${hierarchy[index].charAt(0).toUpperCase() + hierarchy[index].slice(1)}">
                              <datalist id="datalist-${hierarchy[index]}">`;
            data.forEach(item => {
                inputField += `<option value="${item.name}"></option>`;
            });
            inputField += `</datalist><span class="loading-icon" id="loading-${hierarchy[index]}"><i class="fas fa-spinner fa-spin"></i></span>`;
            $('#dropdowns').append(inputField);

            $(`#${hierarchy[index]}`).change(function() {
                // Remove all subsequent input fields and datalists
                for (let i = index + 1; i < hierarchy.length; i++) {
                    $(`#${hierarchy[i]}`).remove();
                    $(`#datalist-${hierarchy[i]}`).remove();
                    $(`#loading-${hierarchy[i]}`).remove();
                }
                loadHierarchyLevel(index + 1);
            });

            $(`#loading-${hierarchy[index]}`).hide();
        }
    });
}
