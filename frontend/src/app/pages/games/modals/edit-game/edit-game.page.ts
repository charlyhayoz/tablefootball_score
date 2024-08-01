import {
  Component,
  OnInit,
  HostListener,
  Input,
  ChangeDetectorRef,
} from '@angular/core';
import { Game } from 'src/app/models/game';
import { PlayersPage } from 'src/app/pages/players/players.page';
import { Services } from 'src/app/services/services.service';
@Component({
  selector: 'app-edit-game',
  templateUrl: './edit-game.page.html',
  styleUrls: ['./edit-game.page.scss'],
})
export class EditGamePage implements OnInit {
  @Input() game!: Game;

  scoreArray: number[];

  constructor(public services: Services, public cdr: ChangeDetectorRef) {
    this.scoreArray = Array(10)
      .fill(0)
      .map((x, i) => i);
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
        this.game.player1 = data;
        this.game.player1_id = data.id;
      } else {
        this.game.player2 = data;
        this.game.player2_id = data.id;
      }

      this.cdr.detectChanges();
    }
  }

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

  saveGame() {
    this.services.apiService
      .put<Game>('game/' + this.game.id, this.game)
      .subscribe((game: Game) => {
        this.services.utilsService.presentToast('Game saved');
      });
  }

  @HostListener('window:popstate', ['$event'])
  async dismiss(role: string = 'dismiss') {
    this.saveGame();
    // using the injected ModalController this page
    // can "dismiss" itself and optionally pass back data
    const modal = await this.services.modalController.getTop();
    if (modal) {
      this.services.modalController.dismiss(this.game, role);
      return;
    }
  }
}
