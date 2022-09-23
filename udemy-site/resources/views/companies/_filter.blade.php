<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
      <form action="">
        <div class="row">
            <div class="col">
                
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input name="search" id="search" value="{{ request('search') }}" type="text" class="form-control" placeholder="Search..." aria-label="Search..."
                        aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button id="btn-clear" class="btn btn-outline-secondary" type="button">
                            <i class="fa fa-refresh"></i>
                        </button>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>
