<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h2>Тасгийн мэдээллийг харах хуудас.</h2>

    <label>Хайх утгыг оруулна уу?</label> <br>
    <label>Жишээлбэл: SI001-SI030, S01-S08</label> <br>
    <input type="character" id="parameterinput">
    <button onclick="activatephp()">Хайх</button>

    <div id="result"></div>

    <script>
        function activatephp() {
            var parametervalue = document.getElementById("parameterinput").value

            fetch('searchdata.php?parameter=' + parametervalue)
            .then(Response => Response.json())
            .then(data => {
                display(data);
            })
            .catch(error => {
                console.error(error);
            });
        }

        function display(data) {
            var divelement = document.getElementById("result");
            divelement.innerHTML = "";

            if (data.message) {
                divelement.innerHTML = "<p>Үр дүн олдсонгүй.</p>";
            } else {
                data.forEach(record => {
                    divelement.innerHTML += "<p>" + record.sectiono + " нэртэй тасагт " + record.condition + " " + record.itemno + " " + record.quantity + " ширхэг байна. "  + "</p>";
                });
            }
        }

    </script>

</body>
</html>