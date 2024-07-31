import { Injectable } from '@angular/core';
import { ApiService } from './api.service';
import { AlertController } from '@ionic/angular';

@Injectable({
  providedIn: 'root',
})
export class Services {
  public apiService!: ApiService;
  constructor(public alertController: AlertController) {}
}
