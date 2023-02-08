<div class='modal fade ' id='information<?php echo $row["id"] ?>' data-bs-keyboard='false' tabindex='-1' aria-labelledby='information' aria-hidden='true'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='card mb-3' style='max-width: 540px'>
                    <div class='row g-0'>
                      <div class=''>
                        <img src='<?php echo $row["image"] ?>' class='img-fluid rounded-start' alt='...' />
                      </div>
                      <div class='col-md-'>
                        <div class='card-body'>
                          <div class='d-flex justify-content-between h-25'>
                            <h5 class='card-title'><?php echo $row["titre"] ?></h5>
                            <h5 class='card-text'><?php echo $row["montant"] ?>$</h5>
                          </div>
                          <h6>Type:<?php echo $row["typeAnnonce"] ?></h6>
                          <h6>
                            <iconify-icon icon='material-symbols:location-on'></iconify-icon><?php echo $row["adresse"] ?>
                          </h6>
                          <h6>
                            <iconify-icon icon='mdi:surface-area'></iconify-icon><?php echo $row["superficie"] ?>m <sup>2</sup>
                          </h6>
                          <h6>
                            <iconify-icon icon='material-symbols:description'></iconify-icon>Description :
                          </h6>
                          <h6 class='card-text text-dark'><?php echo $row["description"] ?></6>
                          <p class='card-text'>
                          <div class='text-muted'>
                            <h6>
                              <iconify-icon icon='healthicons:i-schedule-school-date-time'></iconify-icon><?php echo $row["dateAnnonce"] ?>
                            </h6>
                          </div>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>