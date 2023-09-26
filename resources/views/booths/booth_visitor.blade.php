@extends('master_admin')
@section('title', 'Visitor Booth '. $booth->name)
@section('sidebar')
    @include('includes.admins.booth_sidebar')
@endsection
@section('navbar')
    @include('includes.admins.booth_navbar')
@endsection
@section('content')
    <input type="hidden" name="booth-id" value="{{ $booth->id }}">
    <input type="hidden" name="booth-name" value="{{ $booth->name }}">
    <h2>Data Redeem</h2>
    <div class="card card-body">
        <button class="btn btn-success w-25" onclick="ExportToExcel('xlsx')">Download .xslx</button>
        <div class="my-2 table-responsive">
            <table class="table table-striped table-hover text-nowrap w-100" id="table-visitor-redeem">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Redeem Code</th>
                    <th>Tanggal</th>
                </tr>
                </thead>
                <tbody class="visitor-list">

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        function ExportToExcel(type, fn, dl)  {
            let booth = $('input[name=booth-name]').val()
            let elt = document.getElementById('table-visitor-redeem');
            let wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                XLSX.writeFile(wb, fn || ('Export Booth '+ booth + ' .' + (type || 'xlsx')));
        }
        $(document).ready(function() {
            function getBoothVisitorData() {
                let boothId = $('input[name=booth-id]').val();
                $.ajax({
                    url: '/booth/get/redeem/' + boothId,
                    success: function (response) {
                        let html = ``;
                        let i = 1;
                        response.forEach((visitor) => {
                            html += `
                                <tr>
                                    <td>${i++}</td>
                                    <td>${visitor.user.name}</td>
                                    <td>${visitor.code}</td>
                                    <td>${visitor.created_at}</td>
                                </tr>
                            `;
                        })
                        $('.visitor-list').html(html)
                    },
                    complete: function (data) {
                        setTimeout(getBoothVisitorData, 1000)
                    }
                })
            }

            setTimeout(getBoothVisitorData, 1000);
        });
    </script>
@endsection

