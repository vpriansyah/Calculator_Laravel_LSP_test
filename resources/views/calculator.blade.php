<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Calculator</title>
</head>

<body>
    <div class="container">
        <h1 class="text-align-center">Calculator</h1>
        <div>
            {{-- Form untuk menginputkan bilangan dan operasi --}}
            <form action="/operation" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="bilangan1" class="form-label">Bilangan 1</label>
                    <input type="number" class="form-control" id="bilangan1" name="bilangan1"
                        placeholder="Masukkan bilangan pertama">
                </div>
                <div class="mb-3">
                    <label for="bilangan2" class="form-label">Bilangan 2</label>
                    <input type="number" class="form-control" id="bilangan2" name="bilangan2"
                        placeholder="Masukkan bilangan kedua">
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="operation">
                        <option selected>Operation</option>
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value=":">:</option>
                        <option value="%">%</option>
                    </select>
                </div>
                {{-- Fungsi Alert untuk menampilkan hasil operasi --}}
                @if (session()->has('result'))
                    <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                        {{ session('result') }}&emsp;{{ $previous->result }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Jalankan</button>
                <a href="/previous" type="button" class="btn btn-danger">Previous</a>
            </form>
        </div>
        <br>
        <div>
            {{-- Tabel untuk menampilkan hasil dari operasi ke dalam database --}}
            <h1>Table Result Database</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bilangan 1</th>
                            <th>Bilangan 2</th>
                            <th>Operation</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $bil)
                            <tr>
                                <td>
                                    {{ $bil->bilangan1 }}
                                </td>
                                <td>
                                    {{ $bil->bilangan2 }}
                                </td>
                                <td>
                                    {{ $bil->operation }}
                                </td>
                                <td>
                                    {{ $bil->result }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->
    </div>
    <!-- Option 1 Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
