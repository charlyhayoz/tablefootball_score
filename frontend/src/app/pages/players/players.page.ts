import { Component, OnInit } from '@angular/core';
import { Services } from 'src/app/services/services.service';
import { Player } from 'src/app/models/player';

@Component({
  selector: 'app-players',
  templateUrl: './players.page.html',
  styleUrls: ['./players.page.scss'],
})
export class PlayersPage implements OnInit {
  public players!: Player[];
  private page: number = 1;

  constructor(public services: Services) {}

  ngOnInit() {}

  ionViewDidEnter() {
    this.page = 1;
    this.getPlayers();
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
