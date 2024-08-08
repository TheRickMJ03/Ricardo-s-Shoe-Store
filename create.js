function clearForm() {
    document.getElementById("shoe_form").reset();
}
$(document).ready(() => {
    $("#code").focus();

    // Validate Shoe Code
    $("#shoe_form").submit(event => {
        let isValid = true;
        const code = $("#code").val().trim();
        if (code == "") {
            $("#code").next().text("This field should not be blank.");
            isValid = false;
        } else if (code.length < 4) {
            $("#code").next().text("This field should have a minimum of 4 characters");
            isValid = false;
        } else if (code.length > 10) {
            $("#code").next().text("This field should have a maximum of 10 characters");
            isValid = false;
        } else {
            $("#code").next().text("");
        }

        // Validate Shoe Name
        const name = $("#name").val().trim();
        if (name == "") {
            $("#name").next().text("This field should not be blank");
            isValid = false;
        } else if (name.length < 10) {
            $("#name").next().text("This field should have a minimum of 10 characters");
            isValid = false;
        } else if (name.length > 100) {
            $("#name").next().text("This field should have a maximum of 100 characters");
            isValid = false;
        } else {
            $("#name").next().text("");
        }

        // Validate Shoe Description
        const description = $("#description").val().trim();
        if (description == "") {
            $("#description").next().text("This field should not be blank");
            isValid = false;
        } else if (description.length < 10) {
            $("#description").next().text("This field should have a minimum of 10 characters");
            isValid = false;
        } else if (description.length > 255) {
            $("#description").next().text("This field should have a maximum of 255 characters");
            isValid = false;
        } else {
            $("#description").next().text("");
        }

        // Validate Shoe Price
        const price = $("#price").val().trim();
        if (price == "") {
            $("#price").next().text("This field should not be blank");
            isValid = false;
        } else {
            const numericPrice = parseFloat(price);
            if (isNaN(numericPrice) || numericPrice <= 0) {
                $("#price").next().text("This field should be a positive number");
                isValid = false;
            } else if (numericPrice > 100000) {
                $("#price").next().text("This field should not exceed $100,000");
                isValid = false;
            } else {
                $("#price").next().text("");
            }
        }

        // Prevent form submission if any entries are invalid 
        if (!isValid) {
            event.preventDefault();
        }
    });
});