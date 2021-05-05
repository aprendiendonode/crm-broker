/*
 * Some helper functions to work with our UI and keep our code cleaner
 */

function ui_multi_add_file(id, file) {
    var template = $("#files-template").text();
    template = template.replace("%%filename%%", file.name);

    template = $(template);
    template.prop("id", "uploaderFile" + id);
    template.data("file-id", id);

    $("#files").find("li.empty").fadeOut(); // remove the 'no files yet'
    $("#files").append(template);
}

// Changes the status messages on our list
function ui_multi_update_file_status(id, status, message) {
    $("#uploaderFile" + id)
        .find("span")
        .html(message)
        .prop("class", "status text-" + status);
}

// Updates a file progress, depending on the parameters it may animate it or change the color.
function ui_multi_update_file_progress(id, percent, color, active) {
    color = typeof color === "undefined" ? false : color;
    active = typeof active === "undefined" ? true : active;

    var bar = $("#uploaderFile" + id).find("div.progress-bar");

    bar.width(percent + "%").attr("aria-valuenow", percent);
    bar.toggleClass("progress-bar-striped progress-bar-animated", active);

    if (percent === 0) {
        bar.html("");
    } else {
        bar.html(percent + "%");
    }

    if (color !== false) {
        bar.removeClass("bg-success bg-info bg-warning bg-danger");
        bar.addClass("bg-" + color);
    }
}

/********************************** documents ********************************************************** */

function document_ui_multi_add_file(id, file) {
    var template = $("#document-files-template").text();
    template = template.replace("%%filename%%", file.name);

    template = $(template);
    template.prop("id", "documentUploaderFile" + id);
    template.data("file-id", id);

    $("#document-files").find("li.empty").fadeOut(); // remove the 'no files yet'
    $("#document-files").append(template);
}

// Changes the status messages on our list
function document_ui_multi_update_file_status(id, status, message) {
    $("#uploaderFile" + id)
        .find("span")
        .html(message)
        .prop("class", "status text-" + status);
}

// Updates a file progress, depending on the parameters it may animate it or change the color.
function document_ui_multi_update_file_progress(id, percent, color, active) {
    color = typeof color === "undefined" ? false : color;
    active = typeof active === "undefined" ? true : active;

    var bar = $("#documentUploaderFile" + id).find("div.progress-bar");

    bar.width(percent + "%").attr("aria-valuenow", percent);
    bar.toggleClass("progress-bar-striped progress-bar-animated", active);

    if (percent === 0) {
        bar.html("");
    } else {
        bar.html(percent + "%");
    }

    if (color !== false) {
        bar.removeClass("bg-success bg-info bg-warning bg-danger");
        bar.addClass("bg-" + color);
    }
}

function plan_ui_multi_add_file(id, file) {
    var template = $("#plan-files-template").text();
    template = template.replace("%%filename%%", file.name);

    template = $(template);
    template.prop("id", "planUploaderFile" + id);
    template.data("file-id", id);

    $("#plan-files").find("li.empty").fadeOut(); // remove the 'no files yet'
    $("#plan-files").append(template);
}

// Changes the status messages on our list
function plan_ui_multi_update_file_status(id, status, message) {
    $("#uploaderFile" + id)
        .find("span")
        .html(message)
        .prop("class", "status text-" + status);
}

// Updates a file progress, depending on the parameters it may animate it or change the color.
function plan_ui_multi_update_file_progress(id, percent, color, active) {
    color = typeof color === "undefined" ? false : color;
    active = typeof active === "undefined" ? true : active;

    var bar = $("#planUploaderFile" + id).find("div.progress-bar");

    bar.width(percent + "%").attr("aria-valuenow", percent);
    bar.toggleClass("progress-bar-striped progress-bar-animated", active);

    if (percent === 0) {
        bar.html("");
    } else {
        bar.html(percent + "%");
    }

    if (color !== false) {
        bar.removeClass("bg-success bg-info bg-warning bg-danger");
        bar.addClass("bg-" + color);
    }
}

/********************************** Edit  documents ********************************************************** */

function edit_document_ui_multi_add_file(id, file, listing_id) {
    var template = $("#document-files-template-" + listing_id).text();
    template = template.replace("%%filename%%", file.name);

    template = $(template);
    template.prop("id", "documentUploaderFile" + id);
    template.data("file-id", id);

    $("#document-files-" + listing_id)
        .find("li.empty")
        .fadeOut(); // remove the 'no files yet'
    $("#document-files-" + listing_id).append(template);
}

// Changes the status messages on our list
function edit_document_ui_multi_update_file_status(
    id,
    status,
    message,
    listing_id
) {
    $("#uploaderFile" + id)
        .find("span")
        .html(message)
        .prop("class", "status text-" + status);
}

// Updates a file progress, depending on the parameters it may animate it or change the color.
function edit_document_ui_multi_update_file_progress(
    id,
    percent,
    color,
    active
) {
    color = typeof color === "undefined" ? false : color;
    active = typeof active === "undefined" ? true : active;

    var bar = $("#documentUploaderFile" + id).find("div.progress-bar");

    bar.width(percent + "%").attr("aria-valuenow", percent);
    bar.toggleClass("progress-bar-striped progress-bar-animated", active);

    if (percent === 0) {
        bar.html("");
    } else {
        bar.html(percent + "%");
    }

    if (color !== false) {
        bar.removeClass("bg-success bg-info bg-warning bg-danger");
        bar.addClass("bg-" + color);
    }
}

/********************************** Edit  plans ********************************************************** */

function edit_plan_ui_multi_add_file(id, file, listing_id) {
    var template = $("#plan-files-template-" + listing_id).text();
    template = template.replace("%%filename%%", file.name);

    template = $(template);
    template.prop("id", "planUploaderFile" + id);
    template.data("file-id", id);

    $("#plan-files-" + listing_id)
        .find("li.empty")
        .fadeOut(); // remove the 'no files yet'
    $("#plan-files-" + listing_id).append(template);
}

// Changes the status messages on our list
function edit_plan_ui_multi_update_file_status(
    id,
    status,
    message,
    listing_id
) {
    $("#uploaderFile" + id)
        .find("span")
        .html(message)
        .prop("class", "status text-" + status);
}

// Updates a file progress, depending on the parameters it may animate it or change the color.
function edit_plan_ui_multi_update_file_progress(id, percent, color, active) {
    color = typeof color === "undefined" ? false : color;
    active = typeof active === "undefined" ? true : active;

    var bar = $("#planUploaderFile" + id).find("div.progress-bar");

    bar.width(percent + "%").attr("aria-valuenow", percent);
    bar.toggleClass("progress-bar-striped progress-bar-animated", active);

    if (percent === 0) {
        bar.html("");
    } else {
        bar.html(percent + "%");
    }

    if (color !== false) {
        bar.removeClass("bg-success bg-info bg-warning bg-danger");
        bar.addClass("bg-" + color);
    }
}

/********************************** Edit  photos ********************************************************** */

function edit_ui_multi_add_file(id, file, listing_id) {
    var template = $("#files-template-" + listing_id).text();
    template = template.replace("%%filename%%", file.name);

    template = $(template);
    template.prop("id", "uploaderFile" + id);
    template.data("file-id", id);

    $("#files-" + listing_id)
        .find("li.empty")
        .fadeOut(); // remove the 'no files yet'
    $("#files-" + listing_id).append(template);
}

// Changes the status messages on our list
function edit_ui_multi_update_file_status(id, status, message, listing_id) {
    $("#uploaderFile" + id)
        .find("span")
        .html(message)
        .prop("class", "status text-" + status);
}

// Updates a file progress, depending on the parameters it may animate it or change the color.
function edit_ui_multi_update_file_progress(
    id,
    percent,
    color,
    active,
    listing_id
) {
    color = typeof color === "undefined" ? false : color;
    active = typeof active === "undefined" ? true : active;

    var bar = $("#uploaderFile" + id).find("div.progress-bar");

    bar.width(percent + "%").attr("aria-valuenow", percent);
    bar.toggleClass("progress-bar-striped progress-bar-animated", active);

    if (percent === 0) {
        bar.html("");
    } else {
        bar.html(percent + "%");
    }

    if (color !== false) {
        bar.removeClass("bg-success bg-info bg-warning bg-danger");
        bar.addClass("bg-" + color);
    }
}
