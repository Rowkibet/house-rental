function printContent(element) {
    var restorePage = document.body.innerHTML;
    var printcontent = document.getElementById(element).innerHTML;

    document.body.innerHTML = printcontent;
    window.print();

    document.body.innerHTML = restorePage;
}