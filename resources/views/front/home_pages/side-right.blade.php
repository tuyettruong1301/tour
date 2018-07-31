<div class="col-md-3">
        <div class="sidebar-wrap">
            <div class="side search-wrap animate-box">
                <h3 class="sidebar-heading">Find your tour</h3>
                <form method="post" class="colorlib-form" action="{{route('search-tour')}} ">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <label for="date">Where:</label>
                    <div class="form-field">
                        <input type="text" name="location" class="form-control" placeholder="Search Location">
                    </div>
                    </div>
                    </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="date">Check-in:</label>
                    <div class="form-field">
                        <i class="icon icon-calendar2"></i>
                        <input name="date" class="form-control date" placeholder="Check-in date">
                    </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="guests">Guest</label>
                    <div class="form-field">
                        <i class="icon icon-arrow-down3"></i>
                        <select name="people" id="people" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" name="submit" id="submit" value="Find Tours" class="btn btn-primary btn-block">
                </div>
                </div>
            </form>
            </div>
            <div class="side animate-box">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="sidebar-heading">Price Range</h3>
                        <form method="post" class="colorlib-form-2" action="{{route('search-tour-price')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                            <label for="guests">Price from:</label>

                                <select name="pricelow" class="form-control">
                                <option value="1000000">1,000,000</option>
                                <option value="2000000">2,000,000</option>
                                <option value="3000000">3,000,000</option>
                                <option value="4000000">4,000,000</option>
                                <option value="5000000">5,000,000</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="guests">Price to:</label>
                                <select name="pricehight" class="form-control">
                                <option value="2000000">2,000,000</option>
                                <option value="4000000">4,000,000</option>
                                <option value="6000000">6,000,000</option>
                                <option value="8000000">8,000,000</option>
                                <option value="10000000">10,000,000</option>
                                </select>
                            </div>
                        <center>
                        <input type="submit" name="submit" id="submit" value="Filter" class="btn btn-primary btn-block">
                        <center>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    