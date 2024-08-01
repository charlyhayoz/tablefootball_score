import {
  Component,
  OnInit,
  HostListener,
  Input,
  ChangeDetectorRef,
} from '@angular/core';
import { Player } from 'src/app/models/player';
import { Services } from 'src/app/services/services.service';
import { Game } from 'src/app/models/game';
import { PlayersPage } from 'src/app/pages/players/players.page';

@Component({
  selector: 'app-create-game',
  templateUrl: './create-game.page.html',
  styleUrls: ['./create-game.page.scss'],
})
export class CreateGamePage implements OnInit {
  player1!: Player;
  player2!: Player;
  status: string = 'waiting';
  constructor(public services: Services) {}

  ngOnInit() {}

  ionViewWillEnter() {
    const modalState = {
      modal: true,
      desc: 'fake state for our modal',
    };
    history.pushState(modalState, null!);
  }

  ionViewWillLeave() {
    if (window.history.state.modal) {
      window.history.back();
    }
  }

  async assignPlayer(playerId: number) {
    const modal = await this.services.modalController.create({
      component: PlayersPage,
      componentProps: {
        type: 'modal',
      },
    });
    modal.present();

    const { data } = await modal.onWillDismiss();
    if (data != null) {
      console.log(data);

      if (playerId == 1) {
        this.player1 = data;
      } else {
        this.player2 = data;
      }
    }
  }

  touched: boolean = false;
  storeGame() {
    if (this.player1.id == null) {
      this.services.utilsService.presentToastWarning(
        'Please assign the first player'
      );
      return;
    }

    if (this.player2.id == null) {
      this.services.utilsService.presentToastWarning(
        'Please assign the second player'
      );
      return;
    }

    if (this.player2.id == this.player1.id) {
      this.services.utilsService.presentToastWarning(
        'Please assign different players'
      );
      return;
    }

    this.touched = true;
    let game: Game = {
      status: this.status,
      player1_id: this.player1.id!,
      player2_id: this.player2.id!,
      player1_score: 0,
      player2_score: 0,
    };
    this.services.apiService
      .post<Game>('game', game)
      .subscribe((game: Game) => {
        this.services.utilsService.presentToast('Game saved');
        this.dismiss('data', game);
      });
  }

  @HostListener('window:popstate', ['$event'])
  async dismiss(role: string = 'dismiss', object: any = null) {
    // using the injected ModalController this page
    // can "dismiss" itself and optionally pass back data
    const modal = await this.services.modalController.getTop();
    if (modal) {
      this.services.modalController.dismiss(object, role);
      return;
    }
  }
}
