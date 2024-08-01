import { Component, OnInit, Input, HostListener } from '@angular/core';
import { Services } from 'src/app/services/services.service';
import { Player } from 'src/app/models/player';

@Component({
  selector: 'app-players',
  templateUrl: './players.page.html',
  styleUrls: ['./players.page.scss'],
})
export class PlayersPage implements OnInit {
  @Input() type: string = 'page';

  public players!: Player[];
  private page: number = 1;

  constructor(public services: Services) {}

  ngOnInit() {}

  ionViewDidEnter() {
    this.page = 1;
    this.getPlayers();
  }

  ionViewWillEnter() {
    if (this.type == 'modal') {
      const modalState = {
        modal: true,
        desc: 'fake state for our modal',
      };
      history.pushState(modalState, null!);
    }
  }

  ionViewWillLeave() {
    if (this.type == 'modal') {
      if (window.history.state.modal) {
        window.history.back();
      }
    }
  }

  @HostListener('window:popstate', ['$event'])
  async dismiss(player: any = null) {
    if (this.type == 'modal') {
      // using the injected ModalController this page
      // can "dismiss" itself and optionally pass back data
      const modal = await this.services.modalController.getTop();
      if (modal) {
        this.services.modalController.dismiss(player);
        return;
      }
    }
  }

  async createPlayer() {
    const alert = await this.services.alertController.create({
      header: `Add a new player`,
      inputs: [
        {
          placeholder: 'Pseudo (max 255 characters)',
          name: 'pseudo',
          attributes: {
            minLength: 1,
            maxlength: 255,
          },
        },
      ],
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel',
          handler: () => {},
        },
        {
          text: 'Add',
          role: 'confirm',
          cssClass: 'alert-button-confirm',
          handler: (data) => {
            if (
              data.pseudo == null ||
              data.pseudo.length < 1 ||
              data.pseudo.length > 255
            ) {
              this.services.utilsService.presentToastWarning(
                'The pseudo need to make more than 1 and less than 255 characters'
              );
              return;
            }

            let player: Player = {
              pseudo: data.pseudo,
            };

            this.services.apiService
              .post<Player>('player', player)
              .subscribe((player: Player) => {
                this.players.unshift(player);
                this.services.utilsService.presentToast('Player added');
              });
          },
        },
      ],
    });

    await alert.present();
  }

  async deletePlayer(player: Player) {
    const alert = await this.services.alertController.create({
      header: `Delete player ${player.pseudo} ?`,
      message: 'Deleting this player will also delete all connected games',
      buttons: [
        {
          text: 'Cancel',
          role: 'cancel',
          handler: () => {},
        },
        {
          text: 'Delete',
          role: 'confirm',
          cssClass: 'alert-button-confirm',
          handler: () => {
            this.services.apiService
              .delete<Player>('player/' + player.id)
              .subscribe((player: Player) => {
                this.services.utilsService.presentToast('Player deleted');

                this.players = this.players.filter(
                  (_player) => _player.id != player.id
                );
              });
          },
        },
      ],
    });

    await alert.present();
  }

  getPlayers() {
    this.services.apiService
      .get<Player[]>('player?page=' + this.page)
      .subscribe((players: Player[]) => {
        console.log(players);

        if (this.players == null) {
          this.players = players;
        } else {
          this.players = this.players.concat(players);
        }

        if (this.spinner != null) {
          this.spinner.complete();
        }
        if (this.spinner != null && players.length == 0) {
          this.spinner.disabled = true;
        }
      });
  }

  spinner: any;
  loadData(event: Event) {
    this.page++;
    if (event) {
      this.spinner = event.target;
    }

    this.getPlayers();
  }
}
