var sortByPropertyAz = function (property) {
    return function (x, y) {
        return ((x[property] === y[property]) ? 0 : ((x[property] > y[property]) ? 1 : -1));
    };
};

var sortByPropertyZa = function (property) {
    return function (x, y) {
        return ((x[property] === y[property]) ? 0 : ((x[property] < y[property]) ? 1 : -1));
    };
};

var elProperty;

window.onload = function () {
	createElements();
}

title_ar_up.onclick = function() {
    elProperty = 'title';
	temporaryJson.sort(sortByPropertyZa(elProperty));
	createElements();
};

title_ar_down.onclick = function() {
    elProperty = 'title';
	temporaryJson.sort(sortByPropertyAz(elProperty));
	createElements();
};

year_ar_up.onclick = function() {
    elProperty = 'year';
	temporaryJson.sort(sortByPropertyZa(elProperty));
	createElements();
};

year_ar_down.onclick = function() {
    elProperty = 'year';
	temporaryJson.sort(sortByPropertyAz(elProperty));
	createElements();
};

cat_ar_up.onclick = function() {
    elProperty = 'cat_title';
	temporaryJson.sort(sortByPropertyZa(elProperty));
	createElements();
};

cat_ar_down.onclick = function() {
    elProperty = 'cat_title';
	temporaryJson.sort(sortByPropertyAz(elProperty));
	createElements();
};



