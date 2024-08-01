import { Component, OnInit } from '@angular/core';
import { Services } from 'src/app/services/services.service';
import { Game } from 'src/app/models/game';
import { EditGamePage } from './modals/edit-game/edit-game.page';
import { CreateGamePage } from './modals/create-game/create-game.page';
@Component({
  selector: 'app-games',
  templateUrl: './games.page.html',
  styleUrls: ['./games.page.scss'],
})
export class GamesPage implements OnInit {
  public games!: Game[];
  private page: number = 1;
  constructor(public services: Services) {}

  ngOnInit() {}

  ionViewDidEnter() {
    this.page = 1;
    this.getGames();
  }

  async createGame() {
    const modal = await this.services.modalController.create({
      component: CreateGamePage,
      componentProps: {},
    });
    modal.present();

    const { data, role } = await modal.onWillDismiss();
    if (role === 'data') {
      console.log(data);
      this.games.unshift(data);
      this.editGame(data);
    }
  }

  async editGame(game: Game) {
    const modal = await this.services.modalController.create({
      component: EditGamePage,
      componentProps: {
        game: game,
      },
    });
    modal.present();

    const { data, role } = await modal.onWillDismiss();
    if (role === 'data') {
      game = data;
    }
  }

  async deleteGame(game: Game) {
    const alert = await this.services.alertController.create({
      header: 'Delete game ?',
      message: 'Are you sure to want to delete this game ?',
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
              .delete<Game>('game/' + game.id)
              .subscribe((game: Game) => {
                this.services.utilsService.presentToast('Game deleted');

                this.games = this.games.filter((_game) => _game.id != game.id);
              });
          },
        },
      ],
    });

    await alert.present();
  }

  getGames() {
    this.services.apiService
      .get<Game[]>('game?page=' + this.page)
      .subscribe((games: Game[]) => {
        console.log(games);

        if (this.games == null) {
          this.games = games;
        } else {
          this.games = this.games.concat(games);
        }

        if (this.spinner != null) {
          this.spinner.complete();
        }
        if (this.spinner != null && games.length == 0) {
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

    this.getGames();
  }
}
