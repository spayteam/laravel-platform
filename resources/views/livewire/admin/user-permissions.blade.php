<div>
    <div class="row mb-3 ">
        <div class="col-6">
            <h2>Permissions</h2>
        </div>
        <div class="col-6 justify-content-end form-inline">
            <input type="text" class="form-control mr-1 "  @cannot('create permission') disabled @endcannot placeholder="Permission name" wire:model.debounce.200ms="name">
            <button wire:click="createNewPermission" class="btn btn-primary @cannot('create permission') disabled @endcannot">Create new permission</button>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    @if($is_searcheable)
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="usr">Search:</label>
                    <input type="text" class="form-control" wire:model.debounce.300ms="search"
                           placeholder="Search by name or Email ...">
                    @error('search') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="usr">Order:</label>
                            <select class="form-control" wire:model="orderByInput">
                                <option value="name">Name</option>
                                <option value="email">Email</option>
                                <option value="created_at">Created at</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="usr">Order By:</label>
                            <select class="form-control" wire:model="orderBy">
                                <option value="asc">Asc</option>
                                <option value="desc">Desc</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>guard_name</th>
                            <th>permission_category_id</th>
                            <th>permission_type_id</th>
                            <th>created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->permission_category_id }}</td>
                                <td>{{ $permission->permission_type_id }}</td>
                                <td align="right">{{ $permission->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2 justify-content-center">
        {{ $permissions->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
