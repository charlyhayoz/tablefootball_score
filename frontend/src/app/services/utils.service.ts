import { Injectable } from '@angular/core';
import { ToastController, AlertController } from '@ionic/angular';

@Injectable({
  providedIn: 'root',
})
export class UtilsService {
  constructor(private toastController: ToastController) {}

  async presentToast(message: string) {
    const toast = await this.toastController.create({
      color: 'primary',
      cssClass: 'topToast',
      position: 'top',
      message: message,
      duration: 4000,
      buttons: [
        {
          side: 'start',
          icon: 'information',
          text: '',
          handler: () => {},
        },
      ],
    });
    toast.present();
  }

  async presentToastWarning(message: string) {
    const toast = await this.toastController.create({
      color: 'danger',
      cssClass: 'topToast warningToast',
      position: 'top',
      message: message,
      duration: 4000,
      buttons: [
        {
          side: 'start',
          icon: 'alert',
          text: '',
          handler: () => {},
        },
      ],
    });
    toast.present();
  }
}
