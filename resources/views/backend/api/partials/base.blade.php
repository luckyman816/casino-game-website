            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('app.api_key') <small><a href="javascript:;"
                                id="generateKey">@lang('app.generate')</a></small></label>
                    <input type="text" class="form-control" id="keygen" name="keygen" required
                        value="{{ $edit ? $api->keygen : '' }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('app.api_ip')</label>
                    <input type="text" class="form-control" id="ip" name="ip"
                        value="{{ $edit ? $api->ip : '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('app.update_endpoint')</label>
                    <input type="text" class="form-control" id="update_endpoint" name="update_endpoint"
                        value="{{ $edit ? $api->update_endpoint : '' }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('app.get_endpoint')</label>
                    <input type="text" class="form-control" id="get_endpoint" name="get_endpoint"
                        value="{{ $edit ? $api->get_endpoint : '' }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('app.shops')</label>
                    {!! Form::select('shop_id', $shops, $edit ? $api->shop_id : '', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('app.status')</label>
                    {!! Form::select('status', ['Disabled', 'Active'], $edit ? $api->status : '', ['class' => 'form-control']) !!}
                </div>
            </div>
