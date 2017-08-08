            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                 <a href="add_users.php" style="float:right">Add User</a>
                                <span class="card-title">Users</span>
                                <?php $getData = getAllDataWithActiveRecent('users'); $i=1; ?>
                                <?php $sql = "SELECT users.user_country_id, lkp_countries.country_name FROM users LEFT JOIN lkp_countries ON users.user_country_id=lkp_countries.id GROUP BY users.user_country_id";
                                    $result = $conn->query($sql);

                                    $sql1 = "SELECT users.user_state_id, lkp_states.state_name FROM users LEFT JOIN lkp_states ON users.user_state_id=lkp_states.id GROUP BY users.user_state_id";
                                    $result1 = $conn->query($sql1);

                                    $sql2 = "SELECT users.user_city_id, lkp_cities.city_name FROM users LEFT JOIN lkp_cities ON users.user_city_id=lkp_cities.id GROUP BY users.user_city_id";
                                    $result2 = $conn->query($sql2);
                                 ?>

                                    <div class="col s12 m12 l12">
                                        <div class="col s4 m4 l4">
                                            <select id="select-country">
                                              <option value="">Select Country</option>
                                              <?php while ($getAllCountries = $result->fetch_assoc()) { ?>
                                                <option value="<?php echo $getAllCountries['country_name']; ?>"><?php echo $getAllCountries['country_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col s4 m4 l4">
                                            <select id="select-state">
                                              <option value="">Select State</option>
                                              <?php while ($getAllStates = $result1->fetch_assoc()) { ?>
                                                <option value="<?php echo $getAllStates['state_name']; ?>"><?php echo $getAllStates['state_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col s4 m4 l4">
                                            <select id="select-cities">
                                              <option value="">Select City</option>
                                              <?php while ($getAllCities = $result2->fetch_assoc()) { ?>
                                                <option value="<?php echo $getAllCities['city_name']; ?>"><?php echo $getAllCities['city_name']; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col s12 m12 l12 checkbox_new_div" style="position: relative; top: 9px; text-align:center ;">
                                        <p class="p-v-xs col s4">
                                            <input id="test5" onchange="filterme()" type="checkbox" name="type" value="Active">
                                            <label for="test5">Verified Users</label>
                                        </p>
                                        <p class="p-v-xs col s4">
                                            <input id="test6" onchange="filterme()" type="checkbox" name="type" value="In Active">
                                            <label for="test6">Non Verified Users</label>
                                        </p>                                        
                                    </div>

                                    <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User Name</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>city</th>
                                            <th>User Address </th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['user_name'];?></td>
                                            <td><?php $country =  getIndividualDetails($row['user_country_id'],'lkp_countries','id'); echo $country['country_name']?></td>
                                            <td><?php $country =  getIndividualDetails($row['user_state_id'],'lkp_states','id'); echo $country['state_name']?></td>
                                            <td><?php $country =  getIndividualDetails($row['user_city_id'],'lkp_cities','id'); echo $country['city_name']?></td>
                                            <td><?php echo $row['user_address'];?></td>
                                            <td><?php $getCategoryName = getIndividualDetails($row['status'],'user_status','id'); echo $getCategoryName['status'];?></td>
                                            <td><a href="edit_users.php?uid=<?php echo $row['id'];?>"><i class="material-icons dp48">edit</i></a><a class="click_view" data-modalId="<?php echo $row['id']?>" href="#"><i class="material-icons dp48">visibility</i></a>
                                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                            <div class="modal-dialog" Style="margin-top:10%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3 class="modal-title"><b>User Information</b></h3>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <h5 class="modal-title-set"><b>Name :</b><?php echo $row['user_name'];?></h5>
                                                        <h5 class="modal-title-set"><b>Email :</b><?php echo $row['user_email'];?></h5>
                                                        <h5 class="modal-title-set"><b>Mobile :</b><?php echo $row['user_mobile'];?></h5>
                                                        <h5 class="modal-title-set"><b>Country :</b><?php $country =  getIndividualDetails($row['user_country_id'],'lkp_countries','id'); echo $country['country_name']?></h5>
                                                        <h5 class="modal-title-set"><b>State :</b><?php $country =  getIndividualDetails($row['user_state_id'],'lkp_states','id'); echo $country['state_name']?></h5>
                                                        <h5 class="modal-title-set"><b>City :</b><?php $country =  getIndividualDetails($row['user_city_id'],'lkp_cities','id'); echo $country['city_name']?></h5>
                                                        <h5 class="modal-title-set"><b>Location :</b><?php $country =  getIndividualDetails($row['user_location_id'],'lkp_locations','id'); echo $country['location_name']?></h5>
                                                        <h5 class="modal-title-set"><b>Address :</b><?php echo $row['user_address'];?></h5>
                                                        <h5 class="modal-title-set"><b>Status :</b><?php if ($row['status']==1){echo 'Active';} else {echo  'InActive';}?></h5>
                                                    </div>
                                                    <div class="modal-footer" >
                                                          <button type="button" class="btn" data-dismiss="modal" style="background-color:#f00; color:#fff">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        </tr>
                                         
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
         <?php include_once 'footer.php'; ?>
     