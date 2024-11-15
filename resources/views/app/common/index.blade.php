@extends('utils.layout.base')

@section('title', $controller_title)

@section('content')
    @include('utils.partials.header')


    <div class="row bg-light">
        <div class="col-3">
            <h4>Settings</h4>
            <ul class="list-group" id="links">
                @foreach($rows as $row)
                    <button
                            type="button"
                            id="<?=$row->common_table_db_name?>"
                            class="list-group-item list-group-item-action"
                            onclick="listCommonItems('<?=$row->common_table_db_name?>')">

                            <?php echo $row->common_table_name ?>

                    </button>
                @endforeach


            </ul>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#newCommonItem">
                        New item
                    </button>
                </div>
                <div class="col-12" id="listItems">
                    <table id="items" class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newCommonItem" tabindex="-1" aria-labelledby="newCommonItemLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newCommonItemLabel">New item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <x-forms.form.common-item/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="newCommonItem()">
                        Save
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
