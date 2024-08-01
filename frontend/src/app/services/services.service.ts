import { Injectable } from '@angular/core';
import { ApiService } from './api.service';
import { UtilsService } from './utils.service';

import { AlertController } from '@ionic/angular';
import { ModalController } from '@ionic/angular';
@Injectable({
  providedIn: 'root',
})
export class Services {
  public apiService!: ApiService;
  public utilsService!: UtilsService;
  constructor(
    public alertController: AlertController,
    public modalController: ModalController
  ) {}
}
