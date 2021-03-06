<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
</head>
<body>
    <input type="button" id="export" value="export word" />
    <script type="text/javascript" src="bundle.js"></script>
    <!-- <script src="/Jss/docxtemplater/docxtemplater.v3.1.3.js"></script> -->
    <!-- <script src="/node_modules/jszip/dist/jszip.min.js"></script> -->
    <script src="/Jss/docxtemplater/docxtemplater-latest.js"></script>
    <script src="/Jss/docxtemplater/jszip.min.js"></script>
    <script src="/Jss/docxtemplater/vendor/file-saver.min.js"></script>
    <!--[if IE]><script src="~/Jss/docxtemplater/vendor/jszip-utils-ie.js"></script><![endif]-->
    <!--[if !IE]>-->
    <script src="/Jss/docxtemplater/vendor/jszip-utils.js"></script>
    <!--<![endif]-->
    <script type="text/javascript">
    window.onload = function() {
        let btnExport = document.getElementById("export");
        let loadFile = function(url, callback) {
            /// <summary>
            /// loadFile for export word.
            /// </summary>
            /// <param name="url">The url path.</param>
            /// <param name="callback">The callback.</param>
            JSZipUtils.getBinaryContent(url, function(err, data) {
                callback(null, data);
            });
        };
        btnExport.addEventListener("click", function() {
            loadFile("sample.doc", function(err, content) {
                let objData = {
                    "Academic Title": "大標題"
                };
                let zip = new JSZip(content);
                let doc = new Docxtemplater().loadZip(zip)
                doc.setData(objData) //set the templateVariables
                doc.render() //apply them (replace all occurences of {title} by Hipp, ...)
                let out = doc.getZip().generate({
                        type: "blob"
                    }) //Output the document using Data-URI
                saveAs(out, "output.doc")
            });
        });
    };
    </script>
</body>
</html>