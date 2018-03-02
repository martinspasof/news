    var trans = function(key) {
        if (Object.keys(window.fields[key]).length > 0) {
            return window.fields[key];
        } else {
            return key;
        }
    }